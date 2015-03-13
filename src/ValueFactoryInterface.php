<?php namespace Komparu\Value;

interface ValueFactoryInterface
{
    /**
     * Create a ValueInterface object from a mixed value.
     *
     * @param mixed $value
     * @param string $type
     * @return ValueInterface
     */
    public static function create($value, $type = null);

    /**
     * Create an array of ValueInterface objects based on
     * an array of mixed values.
     *
     * @param array $values
     * @return array
     */
    public static function createFromArray(Array $values);

    /**
     * Convert string to integer or float if needed.
     *
     * @param mixed $value
     * @param string $type
     * @return mixed
     */
    public static function typecast($value, $type = null);

    /**
     * Recursively typecast an array of values.
     *
     * @param array $values
     * @return array
     */
    public static function typecastArray(Array $values);
}