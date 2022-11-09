<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante_id,$nombre_vacante,$user_id)
    {
        $this->vacante_id = $vacante_id;
        $this->nombre_vacante = $nombre_vacante;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Has recibido un nuevo candidato en tu vacante')
            ->line('La vacante es: '.$this->nombre_vacante)
            ->action('Ver notificaciones', url('/notificaciones'))
            ->line('Gracias por utilizar DevJobs');
    }

    public function toDatabase()
    {
        return [
            'id_vacante' => $this->vacante_id,
            'nombre_vacante' => $this->nombre_vacante,
            'user_id' => $this->user_id,
        ];

    }
}
