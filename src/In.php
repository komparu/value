<?php namespace Komparu\Value;

/**
 * Class In
 *
 * Contains multiple values that needs to be
 * present e.g. for filtering.
 *
 * @package Komparu\Value
 */
class In implements Statement
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

    /**
     * @return array
     */
    public function rawValues()
    {
        $raw = [];
        foreach($this->values() as $value) {
            $raw[] = $value->raw();
        }

        return $raw;
    }

    /**
     * Get a string representation of the raw values.
     *
     * @param string $separator
     * @return string
     */
    public function rawValuesAsString($separator = ',')
    {
        return implode($separator, $this->rawValues());
    }

}