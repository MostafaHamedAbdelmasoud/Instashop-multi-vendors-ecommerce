<?php

namespace Modules\Accounts\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Accounts\Entities\Supervisor;
use Modules\Accounts\Http\Filters\SupervisorFilter;

class SupervisorRepository implements CrudRepository
{
    /**
     * @var \Modules\Accounts\Http\Filters\SupervisorFilter
     */
    private $filter;

    /**
     * SupervisorRepository constructor.
     *
     * @param \Modules\Accounts\Http\Filters\SupervisorFilter $filter
     */
    public function __construct(SupervisorFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all clients as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Supervisor::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @return \Modules\Accounts\Entities\Supervisor
     */
    public function create(array $data)
    {
        $supervisor = Supervisor::create($data);

        $this->setType($supervisor, $data);

        $this->uploadAvatar($supervisor, $data);

        return $supervisor;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Supervisor
     */
    public function find($model)
    {
        if ($model instanceof Supervisor) {
            return $model;
        }

        return Supervisor::findOrFail($model);
    }

    /**
     * Update the given client in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $supervisor = $this->find($model);

        $supervisor->update($data);

        $this->setType($supervisor, $data);

        $this->uploadAvatar($supervisor, $data);

        return $supervisor;
    }

    /**
     * Delete the given client from storage.
     *
     * @param mixed $model
     * @throws \Exception
     * @return void
     */
    public function delete($model)
    {
        $this->find($model)->delete();
    }

    /**
     * Set the client type.
     *
     * @param \Modules\Accounts\Entities\Supervisor $supervisor
     * @param array $data
     * @return \Modules\Accounts\Entities\Supervisor
     */
    private function setType(Supervisor $supervisor, array $data)
    {
        if (isset($data['type'])) {
            $supervisor->setType($data['type']);
        }

        return $supervisor;
    }

    /**
     * Upload the avatar image.
     *
     * @param \Modules\Accounts\Entities\Supervisor $supervisor
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Modules\Accounts\Entities\Supervisor
     */
    private function uploadAvatar(Supervisor $supervisor, array $data)
    {
        if (isset($data['avatar'])) {
            $supervisor->addMedia($data['avatar'])->toMediaCollection('avatars');
        }

        return $supervisor;
    }
}
