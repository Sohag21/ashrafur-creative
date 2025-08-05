<?php

namespace App\Providers;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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

    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            $user = User::select('id', 'name', 'email')->first();
            $settings = Settings::select('phone', 'photo')->first();
            $view->with([
                'user' => $user,
                'settings' => $settings,
            ]);
        });


    }

}
