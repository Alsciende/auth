<?php

namespace App\Domain\Model;

/**
 * Interface UserInterface is a data class.
 * A user is a person who registered and can use the application via a token.
 */
interface UserInterface
{
    public function getId(): string;
    public function setProfile(ProfileInterface $profile): void ;
    public function getProfile(): ProfileInterface;
    public function getTokens(): TokenCollection;
}