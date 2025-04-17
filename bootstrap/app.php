<?php

use App\Exceptions\CityNotFoundException;
use App\Exceptions\WeatherApiException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (CityNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'City not found',
            ], 422);
        });

        $exceptions->renderable(function (WeatherApiException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Weather service temporarily unavailable.',
            ], 503);
        });

        $exceptions->renderable(function (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        });
    })->create();
