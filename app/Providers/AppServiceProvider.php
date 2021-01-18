<?php

namespace App\Providers;

use App\Observers\FormAntrianObserver;
use Illuminate\Support\ServiceProvider;
use Modules\FormAntrian\Models\FormAntrian;

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
    public function boot()
    {
        FormAntrian::observe(FormAntrianObserver::class);
    }
}
