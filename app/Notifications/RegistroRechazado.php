<?php

namespace App\Notifications;

use App\Models\Registro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistroRechazado extends Notification
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
            //->from(env('MAIL_USERNAME', 'omondragona@uaemex.mx'), '1er Encuentro Internacional de Cuerpos Académicos y Redes Temáticas')
            ->subject("Notificación de pendientes en su registro al evento '1er Encuentro Internacional de Cuerpos Académicos y Redes Temáticas' ")
            ->greeting('¡Hola!')
            ->line('Lamentamos notificarte que tu registro ha sido rechazado por los siguientes motivos:')
            ->line("{$this->registro->observaciones}")
            ->line("Para poder participar necesitas  enviar tu evidencia de pago nuevamente, da clic en el botón 'Completar pago' de este correo electrónico para adjuntarlos.")
            ->action('Completar pago', url('/registro/' . $this->registro->id . '/completar'))
            ->line("DATOS DEL REGISTRO")
            ->line("Correo electrónico: {$this->registro->email}")
            ->line("Nombre del cuerpo académico, red o grupo: {$this->registro->cuerpo_grupo_red}")
            ->line('¡Gracias por su interés!');
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
