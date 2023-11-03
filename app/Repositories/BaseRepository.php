<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository
{
    protected $model;
    protected $accessLevelFilter = [];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getAllPaginated($data): LengthAwarePaginator
    {
        $query = $this->model;

        if(isset($data['sort_by']['key']) && isset($data['sort_by']['order'])) {
            $query = $query->orderBy($data['sort_by']['key'], $data['sort_by']['order']);
        }

        $perPage = $data['per_page'] ?? 10;
        return $query->paginate($perPage);
    }

    public function getById(string $id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->firstOrCreate($data);
    }

    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}

