<?php

namespace App\Listeners;

use App\Events\RegistroCreated;
use App\Notifications\NewRegistro;
use App\Models\User;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRegistroCreatedNotifications implements ShouldQueue
{


    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegistroCreated $event): void
    {

        //
        $registro = $event->registro;

        // Obtener la dirección de correo electrónico del registro
        $email = $registro->email;

        auth()->user()->notify(new NewRegistro($event->registro));

    }
}
