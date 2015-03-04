<?php namespace Komparu\Value;

/**
 * Class ValueFactory
 *
 * Generate the appropriate value type based on the value string.
 *
 * @package Komparu\Value
 */
class ValueFactory
{
    /**
     * @param mixed $value
     * @param string $type
     * @return ValueInterface
     */
    public static function create($value, $type = null)
    {
        $typecasted = is_null($value) ? null : static::typecast($value, $type);

        if($typecasted == ValueInterface::INFINITE) {
            return new Infinite();
        }
        if($typecasted == -ValueInterface::INFINITE) {
            return new NegativeInfinite();
        }

        return new Value($typecasted, $type);
    }

    /**
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
     * Convert a string value to a useful value object.
     *
     * @param string $value
     * @return mixed
     */
    public static function statementFromString($value)
    {
        if ($range = static::range($value)) {
            return $range;
        } elseif ($partial = static::partial($value)) {
            return $partial;
        } elseif ($in = static::in($value)) {
            return $in;
        }
        elseif ($operator = static::operator($value)) {
            return $operator;
        }
    }

    /**
     * @param array $values
     * @return array
     */
    public static function statementFromArray(Array $values)
    {
        $converted = [];

        foreach($values as $key => $value) {

            $converted[$key] = is_array($value)
                ? static::statementFromArray($value)
                : static::statementFromString($value);
        }

        return $converted;
    }

    /**
     * @param $value
     * @return In|void
     */
    protected static function in($value)
    {
        if(!strstr($value, ',')) return;

        $values = explode(',', $value);
        $converted = static::createFromArray($values);

        return new In($converted);
    }

    /**
     * Convert a string value to a Operator object.
     *
     * @param string $value
     * @return Operator|null
     */
    protected static function operator($value)
    {
        preg_match('/([<|<=|>|>=]{1,2})([a-zA-Z0-9]+)/', $value, $matches);

        $raw = $matches ? $matches[2] : $value;
        $value = static::create($raw);
        $operator = $matches ? $matches[1] : Operator::EQUALS;

        return new Operator($value, $operator);
    }

    /**
     * Convert a string value to a Range value object.
     *
     * @param string $value
     * @return Range|null
     */
    protected static function range($value)
    {
        preg_match('/([a-zA-Z0-9]+)\~([a-zA-Z0-9]+)/', $value, $matches);

        if (!$matches) return;

        $min = static::create($matches[1]);
        $max = static::create($matches[2]);

        return new Range($min, $max);
    }

    /**
     * @param $value
     * @return Partial|null
     */
    protected static function partial($value)
    {
        preg_match('/(~?)([a-zA-Z0-9]+)(~?)/', $value, $matches);

        if(!$matches) return;
        if($matches[1] != '~' and $matches[3] != '~') return;

        $value = static::create($matches[2]);
        $left = $matches[1] == '~';
        $right = $matches[3] == '~';

        return new Partial($value, $left, $right);
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
        switch($type) {

            case 'int':
                return (int) $value;

            case 'bool':
                if($value === 'false') return false;
                return (bool) $value;

            case 'decimal':
                return sprintf('%0.2f', $value);

            case 'float':
                return (float) $value;

            case 'array':
                return is_string($value) ? json_decode($value, true) : $value;
        }

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