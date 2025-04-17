<?php

namespace App\Services;

use App\DTO\WeatherData;
use App\Repositories\Interfaces\WeatherRepositoryInterface;

class WeatherService
{
    public function __construct(
        protected WeatherRepositoryInterface $weatherRepository,
    ) {}

    public function fetchWeather(string $city): WeatherData
    {
        return $this->weatherRepository->getWeatherByCity($city);
    }
}
