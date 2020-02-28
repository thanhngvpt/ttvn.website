<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\FooterComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FooterComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', FooterComposer::class);
    }
}
