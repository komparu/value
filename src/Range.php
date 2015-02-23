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
     * @var ValueInterface
     */
    protected $min;

    /**
     * @var ValueInterface
     */
    protected $max;

    /**
     * @param ValueInterface $min
     * @param ValueInterface $max
     */
    public function __construct(ValueInterface $min, ValueInterface $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @return ValueInterface
     */
    public function min()
    {
        return $this->min;
    }

    /**
     * @return ValueInterface
     */
    public function max()
    {
        return $this->max;
    }
}