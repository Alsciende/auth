<?php

namespace App\Domain\Exception;

class AccessDeniedException extends SecurityException
{
    /**
     * AccessDeniedException constructor.
     */
    public function __construct(string $userId)
    {
        parent::__construct(sprintf(
            'Unknown user [%s].',
            $userId
        ));
    }
}