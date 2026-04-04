<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {

        // Validation Error (422)
        $exceptions->render(function (ValidationException $e, $request) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $e->errors(),
            ], 422);
        });

        // 404
        $exceptions->render(function (NotFoundHttpException $e, $request) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Route not found',
            ], 404);
        });

        // 405
        $exceptions->render(function (MethodNotAllowedHttpException $e, $request) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Method not allowed',
            ], 405);
        });

        // 500
        $exceptions->render(function (\Throwable $e, $request) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 500);
        });

    })->create();
