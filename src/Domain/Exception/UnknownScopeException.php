<?php

namespace App\Domain\Exception;

class UnknownScopeException extends SecurityException
{
    /**
     * UnknownScopeException constructor.
     */
    public function __construct(string $scopeId)
    {
        parent::__construct(sprintf(
            'Unknown scope [%s].',
            $scopeId
        ));
    }
}