<?php namespace Komparu\Value;

/**
 * Class ValueFactory
 *
 * Generate the appropriate value type based on the value string.
 *
 * @package Komparu\Value
 */
class ValueFactory implements ValueFactoryInterface
{
    /**
     * Check if the value is an infinite number.
     *
     * @param $value
     * @return bool
     */
    protected static function isInfinite($value)
    {
        $value = (int) abs($value);

        return floor($value, 0) === ValueInterface::INFINITE;
    }

    /**
     * Create a ValueInterface object from a mixed value.
     *
     * @param mixed $value
     * @param string $type
     * @return ValueInterface
     */
    public static function create($value, $type = null)
    {
        if(static::isInfinite($value)) {
            return ($value > 0) ? new Infinite() : new NegativeInfinite();
        }

        $typecasted = is_null($value) ? null : static::typecast($value, $type);

        return new Value($typecasted, $type);
    }

    /**
     * Create an array of ValueInterface objects based on
     * an array of mixed values.
     *
     * @param array $values
     * @return array
     */
    public static function createFromArray(Array $values)
    {
        $converted = [];
        foreach($values as $key => $value) {
            $converted[$key] = static::create($value);
        }

        return $converted;
    }

    /**
     * Convert string to integer or float if needed.
     *
     * @param mixed $value
     * @param string $type
     * @return mixed
     */
    public static function typecast($value, $type = null)
    {
        // Just return if type is array or object
        if(is_array($value) || is_object($value)) return $value;

        switch((string) $value) {

            // Detect a positive infinite notation
            case '++inf':
            case '∞':
            case '+∞':
            case '&infin;':
            case '+&infin;':
                return ValueInterface::INFINITE;

            // Detect a negative infinite notation
            case '--inf':
            case '-∞':
            case '-&infin;':
                return -ValueInterface::INFINITE;
        }

        // If a type is provided, then its easy to typecast...
        switch($type) {

            case 'int':
                return (int) $value;

            case 'bool':
                if($value === 'false') return false;
                return (bool) $value;

            case 'decimal':
                return round( (float) $value, 2);

            case 'float':
                return (float) $value;

            case 'array':
                return is_string($value) ? json_decode($value, true) : $value;
        }

        // Check if this number is a float or an integer.
        if (is_numeric($value)) {
            return strstr($value, '.')
                ? (float)$value
                : (int)$value;
        }

        return $value;
    }

    /**
     * Recursively typecast an array of values.
     *
     * @param array $values
     * @return array
     */
    public static function typecastArray(Array $values)
    {
        $typecasted = [];

        foreach($values as $key => $value) {
            $typecasted[$key] = is_array($value)
                ? static::typecastArray($value)
                : static::typecast($value);
        }

        return $typecasted;
    }
}