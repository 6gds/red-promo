<?php

namespace App\Listeners;

use App\Events\Subscribed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailSubscribeNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $email;

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Subscribed  $event
     * @return void
     */
    public function handle(Subscribed $event)
    {
        $this->email = $event->subscriber->email;

        Mail::send(["text"=>"mail.subscribe"], ["name"=>"ImagiNation", "mail"=>$event->subscriber->mail], function($message){
            $message->to($this->email, 'To u')->subject('Информация о подписке');
            $message->from('denisgevor200@gmail.com', 'ImagiNation');
        });
    }
}


