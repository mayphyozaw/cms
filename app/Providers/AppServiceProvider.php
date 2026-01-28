<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoryRepoInterface;
use App\Repositories\Contracts\ClientRepoInterface;
use App\Repositories\Contracts\FixedAssetRepoInterface;
use App\Repositories\Contracts\UserRepoInterface;
use App\Repositories\Contracts\VariableAssetRepoInterface;
use App\Repositories\Contracts\VariableCategoryRepoInterface;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\FixedAssetRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\VariableAssetRepository;
use App\Repositories\Eloquent\VariableCategoryRepository;
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
        $this->app->bind(
            CategoryRepoInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            FixedAssetRepoInterface::class,
            FixedAssetRepository::class
        );
        $this->app->bind(
            VariableAssetRepoInterface::class,
            VariableAssetRepository::class
        );
        $this->app->bind(
            VariableCategoryRepoInterface::class,
            VariableCategoryRepository::class
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
