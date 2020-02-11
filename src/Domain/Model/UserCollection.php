<?php

namespace App\Domain\Model;

/**
 * Class TokenCollection is a data class.
 *
 * @implements \IteratorAggregate<UserInterface>
 */
class UserCollection implements \IteratorAggregate
{
    /**
     * @var UserInterface[]
     */
    protected array $collection;

    /**
     * @param UserInterface[] $collection
     */
    public function __construct(array $collection) {
        $this->collection = $collection;
    }

    /**
     * @return \Iterator|UserInterface[]
     */
    public function getIterator(): \Iterator {
        return new \ArrayIterator($this->collection);
    }
}