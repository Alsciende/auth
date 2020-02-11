<?php

namespace App\Domain\Ports;

use App\Domain\Model\UserInterface;

interface UserRepositoryInterface
{
    public function find(string $id): ?UserInterface;
}