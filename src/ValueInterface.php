<?php namespace Komparu\Value;

interface ValueInterface
{
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