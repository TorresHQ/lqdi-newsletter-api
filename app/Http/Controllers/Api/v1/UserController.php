<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Services\User\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return response()->jsonResponseSuccess($users, 'Users retrieved successfully.', 200);
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->create($request->all());
        return response()->jsonResponseSuccess($user, 'User created successfully.', 201);
    }

    public function show (int $id)
    {
        $user = $this->userService->getById($id);
        if (!$user) {
            return response()->jsonResponseError('User not found.', 404);
        }

        return response()->jsonResponseSuccess($user, 'User retrieved successfully.', 200);
    }

    public function update(UserRequest $request, int $id)
    {
        $user = $this->userService->getById($id);
        if (!$user) {
            return response()->jsonResponseError('User not found.', 404);
        }

        $this->userService->update($user, $request->all());
        return response()->jsonResponseSuccessNoData('User updated successfully.', 200);
    }

    public function destroy(int $id)
    {
        $user = $this->userService->getById($id);
        if (!$user) {
            return response()->jsonResponseError('User not found.', 404);
        }

        $this->userService->delete($user);
        return response()->jsonResponseSuccessNoData('User deleted successfully.', 200);
    }
}
