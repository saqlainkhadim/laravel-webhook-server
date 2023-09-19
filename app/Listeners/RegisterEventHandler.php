<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\WebhookServer\WebhookCall;

class RegisterEventHandler
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewUserEvent $event): void
    {
        logger($event->user);
        WebhookCall::create()
            ->url('http://127.0.0.1:8001/webhooks')
            ->useSecret(env('WEBHOOK_SECRET_KEY'))
            ->payload(["user"=>$event->user])
            ->dispatch();
    }
}
