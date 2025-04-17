<?php

namespace App\DTO;

readonly class WeatherData
{
    public function __construct(
        public string $city,
        public int    $temperature,
        public string $description,
        public float  $wind,
        public int    $pressure,
        public int    $humidity,
        public int    $cloudiness,
        public string $icon
    ) {}

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
