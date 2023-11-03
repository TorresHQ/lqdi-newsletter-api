<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class UserService extends BaseService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function create (array $data): Model
    {
        $data['password'] = bcrypt($data['password']);
        return parent::create($data);
    }

    public function getUserByEmail(string $login): ?Model
    {
        return $this->repository->getByEmail($login);
    }
}
