<?php namespace Komparu\Value;

class Infinite extends Value
{
    protected $type = self::TYPE_INTEGER;
    protected $value = 999999999999;

    /**
     * Get the data when to be displayed.
     *
     * @return string
     */
    public function display()
    {
        return 'inf';
    }
}