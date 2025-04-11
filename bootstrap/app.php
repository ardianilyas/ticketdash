<?php

use App\Http\Middleware\HandleAppearance;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->encryptCookies(except: ['appearance', 'sidebar_state']);

        $middleware->web(append: [
            HandleAppearance::class,
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (HttpException $e, $request) {
            $status = $e->getStatusCode();

            if(in_array($status, [500, 503, 404, 403, 401,  429])) {
                $props = [
                    'status' => $status,
                    'previousUrl' => $request->header('referer') ?? url()->previous()
                ];

                if($status === 503 || app()->isDownForMaintenance()) {
                    $props['maintenanceMessage'] = "The application is currently down for maintenance.";
                }

                return inertia('Error', $props)->toResponse($request)
                ->setStatusCode($status);
            }
        });
    })->create();
