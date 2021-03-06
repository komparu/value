<?php namespace Komparu\Value;

interface ValueInterface
{
    /**
     * (added shortstring)
     * List of available types.
     * These are the basic types a value can have.
     */
    const TYPE_STRING       = 'string';
    const TYPE_SHORTSTRING  = 'shortstring';
    const TYPE_TEXT         = 'text';
    const TYPE_INTEGER      = 'int';
    const TYPE_BOOLEAN      = 'bool';
    const TYPE_OBJECT       = 'object';
    const TYPE_FLOAT        = 'float';
    const TYPE_DECIMAL      = 'decimal';
    const TYPE_ARRAY        = 'array';
    const TYPE_DATE         = 'date';
    const TYPE_DATETIME     = 'datetime';
    const TYPE_BLOB         = 'blob';
    const TYPE_CREATED_AT   = 'created_at';
    const TYPE_UPDATED_AT   = 'updated_at';

    /**
     * Use this number to indicate that a value
     * is of type Infinite.
     *
     * This is the maximum 32 bit notation which
     * internally stays an integer. Any number
     * higher than this will result in a float.
     * And that would cause strange behaviour.
     */
    const INFINITE = 999999999;

    /**
     * Infinity symbol uses for casting.
     */
    const INFINITY_SYMBOL = '∞';

    /**
     * Complete fallback value.
     */
    const FALLBACK = -271828182; // a part of e constant for the sake of science

    /**
     * Use magic constant null, for having possibility to set a field to null in MySql.
     */
    const NULL = 'null';

    /**
     * Get the value type.
     *
     * @return string
     */
    public function type();

    /**
     * Get the actual data of this value.
     *
     * @return mixed
     */
    public function raw();

    /**
     * Get the data when to be displayed.
     *
     * @return string
     */
    public function display();
}
