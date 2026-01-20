<?php

namespace App\Providers;

use App\Repositories\Contracts\ClientRepoInterface;
use App\Repositories\Contracts\UserRepoInterface;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(
            UserRepoInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            ClientRepoInterface::class,
            ClientRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
