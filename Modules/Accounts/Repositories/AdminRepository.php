<?php

namespace Modules\Accounts\Repositories;

use Modules\Accounts\Entities\Admin;
use Modules\Contracts\CrudRepository;
use Modules\Accounts\Http\Filters\AdminFilter;

class AdminRepository implements CrudRepository
{
    /**
     * @var \Modules\Accounts\Http\Filters\AdminFilter
     */
    private $filter;

    /**
     * AdminRepository constructor.
     *
     * @param \Modules\Accounts\Http\Filters\AdminFilter $filter
     */
    public function __construct(AdminFilter $filter)
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
        return Admin::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @return \Modules\Accounts\Entities\Admin
     */
    public function create(array $data)
    {
        $admin = Admin::create($data);

        $this->setType($admin, $data);

        $this->uploadAvatar($admin, $data);

        return $admin;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Admin
     */
    public function find($model)
    {
        if ($model instanceof Admin) {
            return $model;
        }

        return Admin::findOrFail($model);
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
        $admin = $this->find($model);

        $admin->update($data);

        $this->setType($admin, $data);

        $this->uploadAvatar($admin, $data);

        return $admin;
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
     * @param \Modules\Accounts\Entities\Admin $admin
     * @param array $data
     * @return \Modules\Accounts\Entities\Admin
     */
    private function setType(Admin $admin, array $data)
    {
        if (isset($data['type'])) {
            $admin->setType($data['type']);
        }

        return $admin;
    }

    /**
     * Upload the avatar image.
     *
     * @param \Modules\Accounts\Entities\Admin $admin
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Modules\Accounts\Entities\Admin
     */
    private function uploadAvatar(Admin $admin, array $data)
    {
        if (isset($data['avatar'])) {
            $admin->addMedia($data['avatar'])->toMediaCollection('avatars');
        }

        return $admin;
    }
}
