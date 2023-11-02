<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(AuthRequest $request): JsonResponse
    {
        $userData = $this->authService->login($request->all());
        if(!$userData){
            return response()->jsonResponseError('Unauthorized', 401);
        }
        return response()->jsonResponseSuccess($userData, 'Login successful', 200);
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout(Auth::user());
        return response()->jsonResponseSuccessNoData('Logged out', 200);
    }
}
