<?php

namespace Furbook\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Furbook\User;
use Furbook\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'partials.forms.cat', 'Furbook\Http\ViewComposers\CatFormComposer'
        );

        // Register model event of User Model
        User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
