<?php

namespace App\Listeners;

use App\Events\RegistroCreated;
use App\Models\Archivo;
use App\Notifications\NewRegistro;
use App\Models\User;

use App\Notifications\NewRegistroConPago;
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

        if ($event->registro->adjuntoPago == 1) { // adjunto pago se envia notificacion para pagados

            $event->registro->notify(new NewRegistroConPago($event->registro));


        } else {
            // Enviar la notificación al correo del registro con boton para completar pago
            $event->registro->notify(new NewRegistro($event->registro));
        }



    }
}
