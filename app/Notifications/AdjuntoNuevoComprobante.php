<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Registro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdjuntoNuevoComprobante extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Registro $registro)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Notificación: un participante ha subido nuevamente su comprobante de pago al evento '1er Encuentro Internacional de Cuerpos Académicos y Redes Temáticas' ")
            ->greeting('¡Hola!')
            ->line("Da click en el botón 'Revisar' para verlo.")
            //->action('Revisar', url('/registro/' . $this->registro->id . '/revision'))
            ->action('Revisar', url('/login'))
            ->line("DATOS DEL REGISTRO")
            ->line("Correo electrónico: {$this->registro->email}")
            ->line("Nombre del cuerpo académico, red o grupo: {$this->registro->cuerpo_grupo_red}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
