<?php

namespace Modules\Stores\Repositories;

use Modules\Stores\Entities\Store;
use Modules\Contracts\CrudRepository;
use Modules\Stores\Http\Filters\StoreFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class StoreRepository implements CrudRepository
{

    /**
     * @var StoreFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\Accounts\Http\Filters\ShippingCompanyOwnerFilter $filter
     */
    public function __construct(StoreFilter $filter)
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
        return Store::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Stores\Entities\Store
     */
    public function create(array $data)
    {
        $store = Store::create($data);

        $this->uploadAvatar($store, $data);

        return $store;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Store
     */
    public function find($model)
    {
        if ($model instanceof Store) {
            return $model;
        }

        return Store::findOrFail($model);
    }

    /**
     * Update the given client in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $store = $this->find($model);

        $this->uploadAvatar($model, $data);

        $store->update($data);

        return $store;
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
     * Upload the avatar image.
     *
     * @param Store $store
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return Store
     */
    private function uploadAvatar(Store $store, array $data)
    {
        if (isset($data['store'])) {
            $store->addMedia($data['store'])->toMediaCollection('stores');
        }

        return $store;
    }
}
