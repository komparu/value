<?php namespace Komparu\Value;

class Value implements ValueInterface
{
    /**
     * @param        $data
     * @param string $type
     */
    public function __construct($data = null, $type = null)
    {
        $this->data = $data;
        $this->type = $type ?: gettype($data);
    }

    /**
     * @var string
     */
    protected $type;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @return mixed
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get the data when to be displayed.
     *
     * @return string
     */
    public function display()
    {
        return $this->data();
    }
}