<?php

namespace App\Domain\Ports;

interface UuidFactoryInterface
{
    public function generate(): string ;
}