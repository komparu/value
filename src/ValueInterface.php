<?php namespace Komparu\Value;

interface ValueInterface
{
    /**
     * List of available types.
     * These are the basic types a value can have.
     */
    const TYPE_STRING   = 'string';
    const TYPE_TEXT     = 'text';
    const TYPE_INTEGER  = 'int';
    const TYPE_BOOLEAN  = 'bool';
    const TYPE_OBJECT   = 'object';
    const TYPE_FLOAT    = 'float';
    const TYPE_DECIMAL  = 'decimal';
    const TYPE_ARRAY    = 'array';
    const TYPE_DATE     = 'date';
    const TYPE_DATETIME = 'datetime';

    /**
     * Use this number to indicate that a value
     * is of type Infinite.
     */
    const INFINITE = 999999999999;

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
    public function data();

    /**
     * Get the data when to be displayed.
     *
     * @return string
     */
    public function display();
}