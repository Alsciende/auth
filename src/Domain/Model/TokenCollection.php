<?php

namespace App\Domain\Model;

/**
 * Class TokenCollection is a data class.
 *
 * @implements \IteratorAggregate<TokenInterface>
 */
class TokenCollection implements \IteratorAggregate
{
    /**
     * @var TokenInterface[]
     */
    protected array $collection;

    /**
     * @param TokenInterface[] $collection
     */
    public function __construct(array $collection) {
        $this->collection = $collection;
    }

    /**
     * @return \Iterator|TokenInterface[]
     */
    public function getIterator(): \Iterator {
        return new \ArrayIterator($this->collection);
    }
}