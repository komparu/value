<?php namespace Komparu\Value;

class Value implements ValueInterface
{
    /**
     * @param        $data
     * @param string $type
     */
    public function __construct($data = null, $type = null)
    {
        if (!isset($this->data)) {
            $this->data = $data;
        }
        if (!isset($this->type)) {
            $this->type = $type ?: gettype($data);
        }
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
     * Get the actual data of this value.
     *
     * @return mixed
     */
    public function raw()
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
        return $this->raw();
    }
}