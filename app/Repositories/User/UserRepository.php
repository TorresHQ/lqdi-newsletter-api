<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = app(config('auth.providers.users.model'));
    }

    public function getByEmail(string $login)
    {
        return $this->model->where('email', $login)->first();
    }
}
