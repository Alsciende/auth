<?php

namespace App\Domain\Message;

class CreateTokenMessage
{
    public string $userId;

    /**
     * @var string[]
     */
    public array $scopes;
}