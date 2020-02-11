<?php

namespace App\Domain\Model;

/**
 * Class ScopeCollection is a data class.
 *
 * @implements \IteratorAggregate<ScopeInterface>
 */
class ScopeCollection implements \IteratorAggregate
{
    /**
     * @var ScopeInterface[]
     */
    protected array $collection;

    /**
     * @param ScopeInterface[] $collection
     */
    public function __construct(array $collection) {
        $this->collection = $collection;
    }

    /**
     * @return \Iterator<ScopeInterface>
     */
    public function getIterator(): \Iterator {
        return new \ArrayIterator($this->collection);
    }
}