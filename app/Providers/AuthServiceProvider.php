<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
        //
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('is_owner', function ($user, $product){
            return $user->id == $product->user_id;
        });
    }
}
