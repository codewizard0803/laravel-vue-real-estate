<?php

namespace App\Providers;

use App\Search\ListSearch;
use Illuminate\Support\ServiceProvider;

class ListSearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Search\ListSearch', function ($app) {
            return new ListSearch();
        });
    }
}
