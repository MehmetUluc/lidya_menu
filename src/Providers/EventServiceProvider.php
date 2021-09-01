<?php

namespace LidyaPos\Menu\Providers;

use LidyaPos\Base\Events\DeletedContentEvent;
use LidyaPos\Menu\Listeners\DeleteMenuNodeListener;
use LidyaPos\Menu\Listeners\UpdateMenuNodeUrlListener;
use LidyaPos\Slug\Events\UpdatedSlugEvent;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UpdatedSlugEvent::class    => [
            UpdateMenuNodeUrlListener::class,
        ],
        DeletedContentEvent::class => [
            DeleteMenuNodeListener::class,
        ],
    ];
}
