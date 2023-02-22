<?php

declare(strict_types=1);

namespace rafapas\BoundedContext\Users\Domain\Event;

use rafapas\BoundedContext\Users\Domain\User;

final class UserCreated
{
    public function __construct(private User $user)
    {
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
