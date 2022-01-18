<?php

namespace App\Notifications;

use App\Models\Contact;
use App\Models\Setting;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Date;

class Contact_notification extends Notification
{
    use Queueable;

    protected $contact;
    protected $reponse;
    protected $sujet;
    

    public function __construct(Contact $contact,string $sujet,string $reponse )
    {
        $this->contact = $contact;
        $this->reponse = $reponse;
        $this->sujet = $sujet;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }
  
   
 public function toMail($notifiable)
    {
        $email_site = Setting::where('code','email')->get()->first();
        $adresse_site = Setting::where('code','website')->get()->first();


        return (new MailMessage)
                ->greeting('Bonjour!')
                ->line('From : '.$email_site->value)
                ->line('To : '.$this->contact->email)
                ->line('Sujet : '.$this->sujet)
                ->line('Réponse : ' . $this->reponse)
                ->action('site web', $adresse_site->value );
    }

  
    public function toArray($notifiable)
    {   
        return [
            'contact' =>$this->contact,
            'date' => new DateTime('now'),
            'reponse' => $this->reponse,
            'sujet' => $this->sujet
        ];
    }
}
