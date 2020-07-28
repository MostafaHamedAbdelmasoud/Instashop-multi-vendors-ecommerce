<?php

namespace Modules\Products\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Products\Entities\Product;
use Modules\Products\Http\Filters\ProductFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class ProductRepository implements CrudRepository
{

    /**
     * @var \Modules\Products\Http\Filters\ProductFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\Products\Http\Filters\ProductFilter $filter
     */
    public function __construct(ProductFilter $filter)
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
        return Product::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Products\Entities\Product
     */
    public function create(array $data)
    {
        $store = Product::create($data);

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
        if ($model instanceof Product) {
            return $model;
        }

        return Product::findOrFail($model);
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
     * @param Product $product
     * @param array $data
     * @return Product
     */
    private function uploadAvatar(Product $product, array $data)
    {
        if (isset($data['store'])) {
            $product->addMedia($data['store'])->toMediaCollection('stores');
        }

        return $product;
    }
}
