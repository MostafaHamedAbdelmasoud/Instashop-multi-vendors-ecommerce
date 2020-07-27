<?php

namespace Modules\Categories\Repositories;

use Modules\Categories\Entities\Category;
use Modules\Contracts\CrudRepository;
use Modules\Categories\Http\Filters\CategoryFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class CategoryRepository implements CrudRepository
{

    /**
     * @var \Modules\Accounts\Http\Filters\CategoryFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\Accounts\Http\Filters\ShippingCompanyOwnerFilter $filter
     */
    public function __construct(CategoryFilter $filter)
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
        return Category::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Categories\Entities\Category
     */
    public function create(array $data)
    {
        $store = Category::create($data);

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
        if ($model instanceof Category) {
            return $model;
        }

        return Category::findOrFail($model);
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
     * @param Category $store
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return Category
     */
    private function uploadAvatar(Category $store, array $data)
    {
        if (isset($data['store'])) {
            $store->addMedia($data['store'])->toMediaCollection('stores');
        }

        return $store;
    }
}
