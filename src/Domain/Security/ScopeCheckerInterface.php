<?php

namespace App\Domain\Security;

use App\Domain\Model\ScopeInterface;
use App\Domain\Model\UserInterface;

/**
 * Interface ScopeCheckerInterface is a service class.
 * It's responsible for checking if a User is granted a Scope.
 */
interface ScopeCheckerInterface
{
    public function isGranted(UserInterface $user, ScopeInterface $scope): bool;
}