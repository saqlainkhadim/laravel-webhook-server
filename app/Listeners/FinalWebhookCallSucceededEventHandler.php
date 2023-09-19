<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\WebhookServer\Events\FinalWebhookCallFailedEvent;

class FinalWebhookCallSucceededEventHandler
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
    public function handle(FinalWebhookCallFailedEvent $event): void
    {
        logger(json_encode($event));
    }
}
