<?php

declare(strict_types=1);

namespace rafapas\Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}
