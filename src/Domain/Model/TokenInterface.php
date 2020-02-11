<?php

namespace App\Domain\Model;

/**
 * Interface TokenInterface is a data class.
 * A token is like a user but with a subset of its permissions.
 * It is the only way for a user to authenticate when using the application.
 */
interface TokenInterface
{
    public function __construct(string $id, UserInterface $user, ScopeCollection $scopes);
    public function getId(): string;
    public function getUser(): UserInterface;
    public function getScopes(): ScopeCollection;
}