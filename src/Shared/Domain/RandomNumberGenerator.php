<?php

declare(strict_types=1);

namespace rafapas\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
