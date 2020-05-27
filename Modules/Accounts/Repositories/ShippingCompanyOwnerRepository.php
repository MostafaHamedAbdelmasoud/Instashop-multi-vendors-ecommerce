<?php

namespace Modules\Accounts\Repositories;

use Modules\Accounts\Entities\Address;
use Modules\Contracts\CrudRepository;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Modules\Accounts\Http\Filters\ShippingCompanyOwnerFilter;
use Modules\Accounts\Entities\ShippingCompany;

/**
 * Class ShippingCompanyOwnerRepository
 * @package Modules\Accounts\Repositories
 */
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
        $shippingCompanyOwner = ShippingCompanyOwner::create($data);

        $this->setType($shippingCompanyOwner, $data);

        $this->uploadAvatar($shippingCompanyOwner, $data);

        return $shippingCompanyOwner;
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
        $shippingCompanyOwner = $this->find($model);

        $shippingCompanyOwner->update($data);

        $this->setType($shippingCompanyOwner, $data);

        $this->uploadAvatar($shippingCompanyOwner, $data);

        return $shippingCompanyOwner;
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
     * @param ShippingCompanyOwner $shippingCompanyOwner
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createShippingCompany(ShippingCompanyOwner $shippingCompanyOwner, array $data)
    {
        return $shippingCompanyOwner->ShippingCompanies()->create($data);
    }

    /**
     * @param ShippingCompany $shippingCompany
     * @param array $data
     * @return ShippingCompany
     */
    public function updateShippingCompany(ShippingCompany $shippingCompany, array $data)
    {
        $shippingCompany->update($data);

        return $shippingCompany;
    }


    /**
     * @param ShippingCompany $shippingCompany
     * @return mixed
     */
    public function deleteShippingCompany(ShippingCompany $shippingCompany)
    {
        return $shippingCompany->delete();
    }



    /**
     * Set the client type.
     *
     * @param \Modules\Accounts\Entities\ShippingCompanyOwner $shippingCompanyOwner
     * @param array $data
     * @return \Modules\Accounts\Entities\ShippingCompanyOwner
     */
    private function setType(ShippingCompanyOwner $shippingCompanyOwner, array $data)
    {
        if (isset($data['type'])) {
            $shippingCompanyOwner->setType($data['type']);
        }

        return $shippingCompanyOwner;
    }

    /**
     * Upload the avatar image.
     *
     * @param \Modules\Accounts\Entities\ShippingCompanyOwner $shippingCompanyOwner
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Modules\Accounts\Entities\ShippingCompanyOwner
     */
    private function uploadAvatar(ShippingCompanyOwner $shippingCompanyOwner, array $data)
    {
        if (isset($data['avatar'])) {
            $shippingCompanyOwner->addMedia($data['avatar'])->toMediaCollection('avatars');
        }

        return $shippingCompanyOwner;
    }
}
