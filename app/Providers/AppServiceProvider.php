<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use GNAHotelSolutions\Weather\Weather;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Paginator::useBootstrap();

        Schema::defaultStringLength(191);

        if (!$this->app->runningInConsole()) {
            view()->composer('*', function ($view) use ($request) {
              
                $view->with([
                ]);
            });
        }
    }
}
