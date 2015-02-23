<?php namespace Komparu\Value;

/**
 * Class Operator
 *
 * @package Komparu\Value
 */
class Operator
{
    const EQUALS                    = '=';
    const GREATER_THAN              = '>';
    const GREATER_THAN_OR_EQUALS    = '>=';
    const LOWER_THAN                = '<';
    const LOWER_THAN_OR_EQUALS      = '<=';

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var string
     */
    protected $operator;

    /**
     * @param mixed  $value
     * @param string $operator
     */
    public function __construct($value, $operator = '=')
    {
        $this->value = $value;
        $this->operator = $operator;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function operator()
    {
        return $this->operator;
    }
}