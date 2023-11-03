<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('jsonResponseSuccess', function ($data, $message, $status) {
            return new JsonResponse(['data' => $data, 'message' => $message, 'status' => $status], $status);
        });

        Response::macro('jsonResponseError', function ($message, $status) {
            return new JsonResponse(['message' => $message, 'status' => $status], $status);
        });

        Response::macro('jsonResponseSuccessNoData', function ($message, $status) {
            return new JsonResponse(['message' => $message, 'status' => $status], $status);
        });

        Response::macro('jsonResponseException', function ($message, $status) {
            return new JsonResponse(throw new HttpException($status, $message));
        });
    }
}
