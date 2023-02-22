<?php

declare(strict_types=1);

namespace rafapas\BoundedContext\Users\Application\Create;

use rafapas\Shared\Domain\Bus\Command\Command;

final class CreateUserCommand implements Command
{
    public function __construct(
        private readonly string $email,
        private readonly string $password
    ) {
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }
}