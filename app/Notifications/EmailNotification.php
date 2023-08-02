<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class EmailNotification extends Notification
{
    use Queueable;

    protected $url;
    protected $title;
    protected $content;
    protected $showButton;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $title, string $content, string $url, bool $showButton)
    {
        $this->title = $title;
        $this->content = $content;
        $this->url = $url;
        $this->showButton = $showButton;
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
        if ($this->showButton) {
            return (new MailMessage)
                ->greeting($this->title)
                ->subject($this->title)
                ->line($this->content)
                ->action('前往设置', $this->url)
                ->line('感谢使用我们的应用！');
        } else {
            return (new MailMessage)
                ->greeting($this->title)
                ->subject($this->title)
                ->line($this->content)
                ->line('感谢使用我们的应用！');
        }
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
