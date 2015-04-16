<?php namespace Komparu\Value;

class Infinite extends Value
{
    protected $type = self::TYPE_INTEGER;
    protected $value = self::INFINITE;
    protected $data = self::INFINITE;

    /**
     * Get the data when to be displayed.
     *
     * @return string
     */
    public function display()
    {
        return '∞';
    }
}