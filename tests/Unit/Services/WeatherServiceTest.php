<?php

namespace Tests\Unit\Services;

use App\DTO\WeatherData;
use App\Repositories\Interfaces\WeatherRepositoryInterface;
use App\Services\WeatherService;
use PHPUnit\Framework\TestCase;

class WeatherServiceTest extends TestCase
{
    public function test_example(): void
    {
        $dto = new WeatherData('Omsk', 19, 'ясно', 3.2, 752, 60, 5, '01d');
        $mockRepo = $this->createMock(WeatherRepositoryInterface::class);
        $mockRepo->expects($this->once())
            ->method('getWeatherByCity')
            ->with('Omsk')
            ->willReturn($dto);

        $service = new WeatherService($mockRepo);
        $result = $service->fetchWeather('Omsk');

        $this->assertInstanceOf(WeatherData::class, $result);
        $this->assertEquals('Omsk', $result->city);
    }
}
