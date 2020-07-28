<?php

namespace Modules\CustomFields\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\CustomFields\Entities\CustomField;
use Modules\CustomFields\Http\Filters\CustomFieldFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class CustomFieldRepository implements CrudRepository
{

    /**
     * @var \Modules\CustomFields\Http\Filters\CustomFieldFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\CustomFields\Http\Filters\CustomFieldFilter $filter
     */
    public function __construct(CustomFieldFilter $filter)
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
        return CustomField::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\CustomFields\Entities\CustomField
     */
    public function create(array $data)
    {
        $store = CustomField::create($data);

        $this->uploadAvatar($store, $data);

        return $store;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Category
     */
    public function find($model)
    {
        if ($model instanceof CustomField) {
            return $model;
        }

        return CustomField::findOrFail($model);
    }

    /**
     * Update the given client in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
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
     * @param CustomField $store
     * @param array $data
     * @return CustomField
     *@throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     */
    private function uploadAvatar(CustomField $store, array $data)
    {
        if (isset($data['store'])) {
            $store->addMedia($data['store'])->toMediaCollection('stores');
        }

        return $store;
    }
}
