<?php

namespace Modules\Accounts\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Modules\Accounts\Http\Filters\ShippingCompanyOwnerFilter;

class ShippingCompanyOwnerRepository implements CrudRepository
{
    /**
     * @var \Modules\Accounts\Http\Filters\ShippingCompanyOwnerFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\Accounts\Http\Filters\ShippingCompanyOwnerFilter $filter
     */
    public function __construct(ShippingCompanyOwnerFilter $filter)
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
        return ShippingCompanyOwner::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @return \Modules\Accounts\Entities\ShippingCompanyOwner
     */
    public function create(array $data)
    {
        $ShippingCompanyOwner = ShippingCompanyOwner::create($data);

        $this->setType($ShippingCompanyOwner, $data);

        $this->uploadAvatar($ShippingCompanyOwner, $data);

        return $ShippingCompanyOwner;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\ShippingCompanyOwner
     */
    public function find($model)
    {
        if ($model instanceof ShippingCompanyOwner) {
            return $model;
        }

        return ShippingCompanyOwner::findOrFail($model);
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
        $ShippingCompanyOwner = $this->find($model);

        $ShippingCompanyOwner->update($data);

        $this->setType($ShippingCompanyOwner, $data);

        $this->uploadAvatar($ShippingCompanyOwner, $data);

        return $ShippingCompanyOwner;
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
     * @param \Modules\Accounts\Entities\ShippingCompanyOwner $ShippingCompanyOwner
     * @param array $data
     * @return \Modules\Accounts\Entities\ShippingCompanyOwner
     */
    private function setType(ShippingCompanyOwner $ShippingCompanyOwner, array $data)
    {
        if (isset($data['type'])) {
            $ShippingCompanyOwner->setType($data['type']);
        }

        return $ShippingCompanyOwner;
    }

    /**
     * Upload the avatar image.
     *
     * @param \Modules\Accounts\Entities\ShippingCompanyOwner $ShippingCompanyOwner
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Modules\Accounts\Entities\ShippingCompanyOwner
     */
    private function uploadAvatar(ShippingCompanyOwner $ShippingCompanyOwner, array $data)
    {
        if (isset($data['avatar'])) {
            $ShippingCompanyOwner->addMedia($data['avatar'])->toMediaCollection('avatars');
        }

        return $ShippingCompanyOwner;
    }
}
