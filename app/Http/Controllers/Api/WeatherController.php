<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeatherRequest;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    public function __construct(
        protected WeatherService $weatherService
    ) {}

    public function __invoke(WeatherRequest $request): JsonResponse
    {
        return response()->json(
            $this->weatherService->fetchWeather($request->validated('city'))->toArray()
        );
    }
}
