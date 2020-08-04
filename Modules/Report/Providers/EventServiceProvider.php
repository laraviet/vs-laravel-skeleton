<?php

namespace Modules\Report\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Order\Events\OrderCompletedEvent;
use Modules\Report\Listeners\UpdateOrderCompletedListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OrderCompletedEvent::class => [
            UpdateOrderCompletedListener::class,
        ]
    ];
}
