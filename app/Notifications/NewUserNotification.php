<?php

namespace App\Notifications;

use App\Models\User as ModelsUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserNotification extends Notification
{

    public function __construct($user)
    {
        $this->user = $user;
        
    }    

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'username' => $this->user->username,
            'email' => $this->user->email,
        ];
    }
}
