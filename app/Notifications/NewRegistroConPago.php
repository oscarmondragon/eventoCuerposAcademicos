<?php

namespace App\Notifications;

use App\Models\Registro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewRegistroConPago extends Notification
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
            ->from(env('MAIL_USERNAME', 'omondragona@uaemex.mx'), '1er Encuentro Internacional de Cuerpos Académicos y Redes Temáticas')
            ->subject("Confirmación de registro al evento '1er Encuentro Internacional de Cuerpos Académicos y Redes Temáticas' ")
            ->line("Correo electrónico registrado: {$this->registro->email}")
            ->line("Nombre del cuerpo académico, red o grupo:")
            ->line("{$this->registro->cuerpo_grupo_red}")
            ->line('¡Registro exitoso!')
            ->line('Gracias por su registro, será revisado y de ser validado el pago se le enviará un correo electronico de confirmación!');

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
