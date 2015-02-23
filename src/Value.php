<?php namespace Komparu\Value;

class Value implements ValueInterface
{
    /**
     * List of available types.
     * These are the basic types a value can have.
     */
    const TYPE_STRING   = 'string';
    const TYPE_TEXT     = 'text';
    const TYPE_INTEGER  = 'int';
    const TYPE_BOOLEAN  = 'bool';
    const TYPE_OBJECT   = 'object';
    const TYPE_FLOAT    = 'float';
    const TYPE_DECIMAL  = 'decimal';
    const TYPE_ARRAY    = 'array';
    const TYPE_DATE     = 'date';
    const TYPE_DATETIME = 'datetime';

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