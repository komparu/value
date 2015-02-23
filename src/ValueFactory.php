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
     * @return ValueInterface
     */
    public static function create($value)
    {
        $typecasted = static::typecast($value);

        if($typecasted == ValueInterface::INFINITE) {
            return new Infinite();
        }
        if($typecasted == -ValueInterface::INFINITE) {
            return new NegativeInfinite();
        }

        return new Value($typecasted);
    }
    /**
     * Convert a string value to a useful value object.
     *
     * @param string $value
     * @return mixed
     */
    public static function fromString($value)
    {
        if ($range = static::range($value)) {
            return $range;
        } elseif ($partial = static::partial($value)) {
            return $partial;
        }
        elseif ($operator = static::operator($value)) {
            return $operator;
        }
    }

    /**
     * Convert a string value to a Operator object.
     *
     * @param string $value
     * @return Operator|null
     */
    public static function operator($value)
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
    public static function range($value)
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
    public static function partial($value)
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
}