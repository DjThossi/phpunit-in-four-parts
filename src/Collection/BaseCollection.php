<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Collection;

use Countable;
use Iterator;

abstract class BaseCollection implements Iterator, Countable
{
    /**
     * @var array
     */
    private $elements = [];

    abstract public function current();

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->elements);
    }

    public function next(): void
    {
        next($this->elements);
    }

    public function rewind(): void
    {
        reset($this->elements);
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return \array_key_exists($this->key(), $this->elements);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return \count($this->elements);
    }

    /**
     * @return mixed
     */
    protected function getCurrent()
    {
        return current($this->elements);
    }

    /**
     * @param mixed $element
     */
    protected function addElement($element): void
    {
        $this->elements[] = $element;
    }
}
