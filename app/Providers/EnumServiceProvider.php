<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EnumServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path(). '\Enums\PaymentStatusEnum';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
