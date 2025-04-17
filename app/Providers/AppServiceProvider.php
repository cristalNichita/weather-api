<?php

namespace App\Providers;

use App\Repositories\Interfaces\WeatherRepositoryInterface;
use App\Repositories\WeatherRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WeatherRepositoryInterface::class, WeatherRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
