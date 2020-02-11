<?php

namespace App\Domain\Model;

/**
 * Class ProfileCollection is a data class
 *
 * @implements \IteratorAggregate<ProfileInterface>
 */
class ProfileCollection implements \IteratorAggregate
{
    /**
     * @var ProfileInterface[]
     */
    protected array $collection;

    /**
     * @param ProfileInterface[] $collection
     */
    public function __construct(array $collection) {
        $this->collection = $collection;
    }

    /**
     * @return \Iterator<ProfileInterface>
     */
    public function getIterator(): \Iterator {
        return new \ArrayIterator($this->collection);
    }
}