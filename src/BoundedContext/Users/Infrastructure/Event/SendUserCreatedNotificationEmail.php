<?php

declare(strict_types=1);

namespace rafapas\BoundedContext\Users\Infrastructure\Event;

use rafapas\BoundedContext\Users\Domain\Event\UserCreated;
use rafapas\Shared\Domain\Bus\Event\EventHandler;

final class SendUserCreatedNotificationEmail implements EventHandler
{
    public function __construct(private EmailService $emailService)
    {
    }

    public function __invoke(UserCreated $event): void
    {
        $user = $event->getUser();

        // Utilizamos el servicio de correo electrónico para enviar la notificación, 
        // pueden existir diferentes servicios de correo electrónico poniendo una interfaz por el mediopodemos utilizar los que queramos
        // y desacoplar el código de la implementación.
        $this->emailService->send(
            $user->getEmail(),
            'Bienvenido a nuestro sitio web',
            'Gracias por registrarse en nuestro sitio web.'
        );
    }
}
