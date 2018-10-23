<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAutoResponder implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;
        if (auth()->check()) {
            $message->email = auth()->user()->email;
        }
        Mail::send('mails.sent', ['msg' => $message], function($m) use ($message){
            $m->to($message->email, $message->name)->subject('Tu mensaje fue recibido');
        });

    }
}
