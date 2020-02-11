<?php

namespace App\Domain\Factory;

use App\Domain\Exception\CannotGrantTokenException;
use App\Domain\Model\ScopeCollection;
use App\Domain\Model\TokenInterface;
use App\Domain\Model\UserInterface;
use App\Domain\Security\ScopeCheckerInterface;

/**
 * Class TokenFactory is a service class.
 * It's responsible for creating TokenInterface instances.
 */
class TokenFactory
{
    public ScopeCheckerInterface $scopeChecker;
    public string $tokenClass;

    public function __construct(ScopeCheckerInterface $scopeChecker, string $tokenClass)
    {
        $this->scopeChecker = $scopeChecker;
        $this->tokenClass = $tokenClass;
    }
    
    /**
     * Create a new token for a user and a set of scopes.
     *
     * @throws CannotGrantTokenException
     */
    public function createToken(string $id, UserInterface $user, ScopeCollection $scopes): TokenInterface
    {
        foreach ($scopes as $scope) {
            if (false === $this->scopeChecker->isGranted($user, $scope)) {
                throw new CannotGrantTokenException($user, $scope);
            }
        }

        return new $this->tokenClass($id, $user, $scopes);
    }
}