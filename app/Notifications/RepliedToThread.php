<?php

namespace App\Notifications;

use Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RepliedToThread extends Notification
{
    use Queueable;

    protected $newProject;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newProject)
    {
        $this->newProject = $newProject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'newProject'=>$this->newProject,
            'user'=>\Illuminate\Support\Facades\Auth::user()
        ];
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
            //
        ];
    }


}
