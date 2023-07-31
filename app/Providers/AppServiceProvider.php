<?php

namespace App\Providers;

use App\Repositories\User\DbUserRepository;
use App\Repositories\User\IUserRepository;
use App\Services\Auth\AuthService;
use App\Services\Auth\IAuthService;
use App\Services\User\IUserService;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IAuthService::class, AuthService::class);
        $this->app->singleton(IUserService::class, UserService::class);
        $this->app->singleton(IUserRepository::class, DbUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
