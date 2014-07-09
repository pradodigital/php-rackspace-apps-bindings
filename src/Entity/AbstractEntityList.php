<?php

namespace PradoDigital\Rackspace\Apps\Entity;

abstract class AbstractEntityList extends AbstractEntity implements \IteratorAggregate, \Countable
{
    protected $offset;

    protected $size;

    protected $total;

    public function count()
    {
        return $this->getTotal();
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setOffset($offset)
    {
        $this->offset = intval($offset);
        return $this;
    }

    public function setSize($size)
    {
        $this->size = intval($size);
        return $this;
    }

    public function setTotal($total)
    {
        $this->total = intval($total);
        return $this;
    }
}
