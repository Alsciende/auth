<?php

namespace App\Domain\Exception;

use App\Domain\Model\ScopeInterface;
use App\Domain\Model\UserInterface;

class CannotGrantTokenException extends SecurityException
{
    public function __construct(UserInterface $user, ScopeInterface $scope)
    {
        parent::__construct(sprintf(
            'Cannot grant role [%s] to token for user [%s].',
            $scope->getId(),
            $user->getId()
        ));
    }
}