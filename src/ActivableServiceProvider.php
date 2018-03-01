<?php

namespace Roshangara\Activable;

use Illuminate\Support\ServiceProvider;

class ActivableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }
}
