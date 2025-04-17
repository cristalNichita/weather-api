<?php

namespace App\Repositories\Interfaces;

use App\DTO\WeatherData;
use Illuminate\Http\JsonResponse;

interface WeatherRepositoryInterface
{
    public function getWeatherByCity(string $city): WeatherData;
}
