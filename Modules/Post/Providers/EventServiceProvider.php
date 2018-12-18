<?php

namespace Modules\Post\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Modules\Post\Events\PostCreated;
use Modules\Post\Listeners\NotifyUsers;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;



    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Event::listen(PostCreated::class , NotifyUsers::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
