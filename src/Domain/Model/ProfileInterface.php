<?php

namespace App\Domain\Model;

/**
 * Interface ProfileInterface is a data class.
 * A profile is the set of authorizations that a group of users have in the application.
 */
interface ProfileInterface
{
    public function getScopes(): ScopeCollection;
    public function setScopes(ScopeCollection $scopes): void ;
    public function clearScopes(): void ;
    public function addScope(ScopeInterface $scope): void ;
    public function getUsers(): UserCollection;
}