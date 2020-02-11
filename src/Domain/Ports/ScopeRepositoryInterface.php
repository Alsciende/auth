<?php

namespace App\Domain\Ports;

use App\Domain\Model\ScopeInterface;

interface ScopeRepositoryInterface
{
    public function find(string $id): ?ScopeInterface;
}