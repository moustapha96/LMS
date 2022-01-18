<?php

namespace App\Notifications;

use App\Models\Message;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Notifications extends Notification
{
    use Queueable;
    protected $sender;
    protected $message;
    protected $reciver;

    
    public function __construct(Message $message, User $sender, User $receiver)
    {
        $this->message = $message;
        $this->sender = $sender;
        $this->receiver = $receiver;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('From : '.$this->sender->email)
                    ->line('To : '.$this->receiver->email)
                    ->line('subject : '.$this->message->subject)
                    ->line('Body : ' . $this->message->body)
                    ->line('Attachement  : ' . $this->message->attachment)
                    ->action('Notification Action', url('/'));
    }

    public function toDatabase(){
        return [
            'subject' =>$this->message->subject,
            'body' => $this->message->body,
            'attachment' => $this->message->attachment,
            'sender_id' => $this->sender->id,
            'date'=> $this->message->date,
            'sender' => $this->sender->email,
            'receiver' => $this->receiver->email
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'subject' =>$this->message->subject,
            'body' => $this->message->body,
            'attachment' => $this->message->attachment,
            'sender_id' => $this->sender->id,
            'date'=> $this->message->date,
            'sender' => $this->sender->email,
            'receiver' => $this->receiver->email
        ];
    }
}
