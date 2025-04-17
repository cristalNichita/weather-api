<?php

namespace Tests\Unit\Repositories;

use App\DTO\WeatherData;
use App\Repositories\WeatherRepository;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class OpenWeatherRepositoryTest extends TestCase
{
    public function test_fetch_weather_returns_valid_dto()
    {
        Http::fake([
            'api.openweathermap.org/*' => Http::response([
                'name' => 'Omsk',
                'main' => ['temp' => 15.7, 'pressure' => 752, 'humidity' => 65],
                'weather' => [['description' => 'ясно', 'icon' => '01d']],
                'wind' => ['speed' => 4.5],
                'clouds' => ['all' => 5]
            ])
        ]);

        $repo = new WeatherRepository();
        $dto = $repo->getWeatherByCity('Omsk');

        $this->assertInstanceOf(WeatherData::class, $dto);
        $this->assertSame('Omsk', $dto->city);
        $this->assertSame(16, $dto->temperature);
    }
}
