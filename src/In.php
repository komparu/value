<?php namespace Komparu\Value;

/**
 * Class In
 *
 * Contains multiple values that needs to be
 * present e.g. for filtering.
 *
 * @package Komparu\Value
 */
class In
{
    /**
     * @var ValueInterface[]
     */
    protected $values;

    /**
     * @param Array $values
     */
    public function __construct(Array $values)
    {
        foreach($values as $value) {
            $this->add($value);
        }
    }

    /**
     * @param ValueInterface $value
     */
    public function add(ValueInterface $value)
    {
        $this->values[] = $value;
    }

    /**
     * @return ValueInterface[]
     */
    public function values()
    {
        return $this->values;
    }

}