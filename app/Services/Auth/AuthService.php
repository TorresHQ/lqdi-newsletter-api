<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\User\UserService;

class AuthService
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(array $credentials): array
    {
        if(Auth::attempt($credentials)){
            $user = $this->userService->getUserByEmail($credentials['email']);
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $user->createToken('authToken')->plainTextToken,
            ];
        }
        return [];
    }

    public function logout(User $user): void
    {
        $user->tokens()->delete();
    }
}
