<?php namespace Komparu\Value;

/**
 * Class Range
 *
 * Is used when a conditional value must be between a min
 * and max value. E.g. 'BETWEEN min AND max'
 *
 * @package Komparu\Value
 */
class Range
{
    /**
     * @var
     */
    protected $min;

    /**
     * @var
     */
    protected $max;

    /**
     * @param $min
     * @param $max
     */
    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @return int|float
     */
    public function min()
    {
        return $this->min;
    }

    /**
     * @return int|float
     */
    public function max()
    {
        return $this->max;
    }
}