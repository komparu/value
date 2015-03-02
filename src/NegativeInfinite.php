<?php namespace Komparu\Value;

class NegativeInfinite extends Value
{
    protected $type = self::TYPE_INTEGER;

    /**
     * @return int
     */
    public function raw()
    {
        return - static::INFINITE;
    }

    /**
     * Get the data when to be displayed.
     *
     * @return string
     */
    public function display()
    {
        return '-inf';
    }
}