<?php

namespace Komparu\Value;

class Partial
{
    /**
     * @var ValueInterface
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
     * @param ValueInterface $value
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
     * @return ValueInterface
     */
    public function value()
    {
        return $this->value;
    }

} 