<?php

declare(strict_types=1);

namespace rafapas\BoundedContext\Users\Application\Create;

use rafapas\BoundedContext\Users\Domain\User;
use rafapas\BoundedContext\Users\Domain\UserRepository;
use rafapas\BoundedContext\Users\Domain\Event\UserCreated;
use rafapas\Shared\Domain\Bus\Command\CommandHandler;
use rafapas\Shared\Domain\Bus\Event\EventBus;

final class CreateUserCommandHandler implements CommandHandler
{
    public function __construct(
        private UserRepository $userRepository,
        private EventBus $eventBus
        )
    {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $user = User::create($command->email(), $command->password());

        $this->userRepository->save($user);

        $event = new UserCreated($user);
        $this->eventBus->dispatch($event);
    }
}