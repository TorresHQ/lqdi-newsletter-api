<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseService
{
    protected $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getAllPaginated(array $data): LengthAwarePaginator
    {
        return $this->repository->getAllPaginated($data);
    }

    public function getById(string $id): ?Model
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function update(Model $model, array $data): bool
    {
        return $this->repository->update($model, $data);
    }

    public function delete(Model $model): bool
    {
        return $this->repository->delete($model);
    }
}
