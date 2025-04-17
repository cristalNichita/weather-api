<?php

namespace App\Repositories;

use App\DTO\WeatherData;
use App\Exceptions\CityNotFoundException;
use App\Exceptions\WeatherApiException;
use App\Repositories\Interfaces\WeatherRepositoryInterface;
use Illuminate\Support\Facades\Http;

class WeatherRepository implements WeatherRepositoryInterface
{
    public function getWeatherByCity(string $city): WeatherData
    {
        $response = Http::withOptions([
            'http_errors' => false
        ])->get('https://api.openweathermap.org/data/2.5/weather', [
            'q'     => $city,
            'appid' => config('services.openweather.key'),
            'units' => 'metric',
            'lang'  => 'ru',
        ]);

        if ($response->status() === 404) {
            throw new CityNotFoundException("City not found: {$city}");
        }

        if ($response->serverError()) {
            throw new WeatherApiException("Weather service temporarily unavailable.");
        }

        if ($response->clientError()) {
            throw new WeatherApiException("Bad request to weather API: " . $response->body());
        }

        $data = $response->json();

        return new WeatherData(
            city: $data['name'],
            temperature: round($data['main']['temp']),
            description: $data['weather'][0]['description'],
            wind: $data['wind']['speed'],
            pressure: $data['main']['pressure'],
            humidity: $data['main']['humidity'],
            cloudiness: $data['clouds']['all'] ?? 0,
            icon: $data['weather'][0]['icon'],
        );
    }
}
