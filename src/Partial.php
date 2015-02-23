<?php

namespace Komparu\Value;

class Partial
{
    /**
     * @var
     */
    protected $value;

    /**
     * @var bool
     */
    protected $left;

    /**
     * @var bool
     */
    protected $right;

    /**
     * @param $value
     * @param $left
     * @param $right
     */
    public function __construct($value, $left, $right)
    {
        $this->value = $value;
        $this->left = (bool) $left;
        $this->right = (bool) $right;
    }

    /**
     * @return boolean
     */
    public function right()
    {
        return $this->right;
    }

    /**
     * @return boolean
     */
    public function left()
    {
        return $this->left;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

} 