<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Session;


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

    public function boot() {
        Schema::defaultStringLength(191);

        //check if current locale is empty if so a default locale must be provided
        if(!Session::has('locale')) {
            session(['local' => 'en']);
        }
        setlocale(LC_ALL, config('app.locale') . '.utf8');
        Carbon::setLocale(config('app.locale'));
    }
}
