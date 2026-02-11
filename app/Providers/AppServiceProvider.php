<?php

namespace App\Providers;

use App\Repositories\Contracts\AssetRepoInterface;
use App\Repositories\Contracts\CategoryRepoInterface;
use App\Repositories\Contracts\ClientRepoInterface;
use App\Repositories\Contracts\FixedAssetRepoInterface;
use App\Repositories\Contracts\PermissionRepoInterface;
use App\Repositories\Contracts\ProjectCategoryRepoInterface;
use App\Repositories\Contracts\ProjectRepoInterface;
use App\Repositories\Contracts\RoleRepoInterface;
use App\Repositories\Contracts\SupplierRepoInterface;
use App\Repositories\Contracts\UserRepoInterface;
use App\Repositories\Contracts\VariableAssetRepoInterface;
use App\Repositories\Contracts\VariableCategoryRepoInterface;
use App\Repositories\Contracts\WarehouseRepoInterface;
use App\Repositories\Contracts\WorkScopeRepoInterface;
use App\Repositories\Eloquent\AssetRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\FixedAssetRepository;
use App\Repositories\Eloquent\PermissionRepository;
use App\Repositories\Eloquent\ProjectCategoryRepository;
use App\Repositories\Eloquent\ProjectRepository;
use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\SupplierRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\VariableAssetRepository;
use App\Repositories\Eloquent\VariableCategoryRepository;
use App\Repositories\Eloquent\WarehouseRepository;
use App\Repositories\Eloquent\WorkScopeRepository;
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
            SupplierRepoInterface::class,
            SupplierRepository::class
        );
        $this->app->bind(
            RoleRepoInterface::class,
            RoleRepository::class
        );
        $this->app->bind(
            PermissionRepoInterface::class,
            PermissionRepository::class
        );
        $this->app->bind(
            WarehouseRepoInterface::class,
            WarehouseRepository::class
        );
        $this->app->bind(
            CategoryRepoInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            AssetRepoInterface::class,
            AssetRepository::class
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
        $this->app->bind(
            ProjectRepoInterface::class,
            ProjectRepository::class
        );
        $this->app->bind(
            ProjectCategoryRepoInterface::class,
            ProjectCategoryRepository::class
        );
        $this->app->bind(
            WorkScopeRepoInterface::class,
            WorkScopeRepository::class
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
