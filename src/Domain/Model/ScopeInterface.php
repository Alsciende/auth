<?php

namespace App\Domain\Model;

/**
 * Interface ScopeInterface is a data class.
 * A scope is an authorization to do some action in the application.
 */
interface ScopeInterface
{
    public function getId(): string ;
    public function getProfiles(): ProfileCollection;
    public function getTokens(): TokenCollection;
}