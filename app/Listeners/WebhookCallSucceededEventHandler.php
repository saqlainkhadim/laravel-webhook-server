<?php

namespace App\Listeners;

use App\Events\Spatie\WebhookServer\Events\WebhookCallSucceededEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class WebhookCallSucceededEventHandler
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
    public function handle(WebhookCallSucceededEvent $event): void
    {
        logger("hello from WebhookCallSucceededEvent");
        $payload = $event->payload["user"];
        /**
         * update user's record
         */
        $user = User::find($payload->id);
        $user->webhook_status = true;
        $user->save();
        return true;
    }
}
