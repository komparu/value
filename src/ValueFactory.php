<?php namespace Komparu\Value;

use Komparu\Document\Contract\Value;

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
     * Convert a string value to a useful value object.
     *
     * @param string $value
     * @return mixed
     */
    public static function fromString($value)
    {
        if ($operator = static::operator($value)) {
            return $operator;
        } elseif ($range = static::range($value)) {
            return $range;
        } elseif ($partial = static::partial($value)) {
            return $partial;
        }

        return new Operator(static::typecast($value));
    }

    /**
     * Convert a string value to a Operator object.
     *
     * @param string $value
     * @return Operator|null
     */
    public static function operator($value)
    {
        preg_match('/([<|<=|>|>=]{1})([a-zA-Z0-9]+)/', $value, $matches);

        if (!$matches) return;

        return new Operator(static::typecast($matches[1]), $matches[0]);
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

        return new Range($value, static::typecast($matches[1]), static::typecast($matches[2]));
    }

    /**
     * @param $value
     * @return Partial|null
     */
    public static function partial($value)
    {
        preg_match('/(~?)([a-zA-Z0-9]+)(~?)/', $value, $matches);
        if ($matches and ($matches[1] == '~' or $matches[3] == '~')) {
            return new Partial($matches[2], $matches[1] == '~', $matches[3] == '~');
        } else {
            return null;
        }

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