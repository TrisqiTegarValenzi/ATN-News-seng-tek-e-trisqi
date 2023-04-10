<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentReplied extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $komentar;

    public function __construct($komentar)
    {
        $this->komentar = $komentar;
    }
    


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
        ->line('Komentar Anda telah dibalas.')
        ->action('Lihat Komentar', url('/comments/' . $this->komentar->id))
        ->line('Terima kasih telah menggunakan aplikasi kami!');
}


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'comment_id' => $this->komentar->id,
            'comment_url' => url('/comments/' . $this->komentar->id),
            'user_name' => $this->komentar->user->name,
            'user_image' => $this->komentar->user->image_url,
            'comment_body' => $this->komentar->body,
        ];
    }
    
}
