<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Railway terminates HTTPS at its edge and forwards requests over
        // plain HTTP, so Laravel doesn't see the original request as secure.
        // Force https:// on generated URLs (asset(), route(), etc.) in
        // production so the browser doesn't block them as mixed content.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
