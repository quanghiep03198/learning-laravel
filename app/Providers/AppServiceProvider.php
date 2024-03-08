<?php

namespace App\Providers;

use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use App\Services\Interfaces\AuthServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerRepository();
        $this->registerService();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }

    /**
     * @return void
     */
    public function registerService()
    {
        $this->app->singleton(AuthServiceInterface::class, AuthService::class);
        $this->app->singleton(ProductServiceInterface::class, ProductService::class);
    }
    public function registerRepository()
    {
        $this->app->singleton(IUserRepository::class, UserRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
    }
}
