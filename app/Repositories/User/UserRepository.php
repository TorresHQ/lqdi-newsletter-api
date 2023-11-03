<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = app(config('auth.providers.users.model'));
    }

    public function getByEmail(string $login): ?Model
    {
        return $this->model->where('email', $login)->first();
    }
}
