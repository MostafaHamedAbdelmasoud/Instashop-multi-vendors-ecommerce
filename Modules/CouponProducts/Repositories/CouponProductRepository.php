<?php

namespace Modules\CouponProducts\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\CouponProducts\Entities\CouponProduct;
use Modules\CouponProducts\Http\Filters\CouponProductFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class CouponProductRepository implements CrudRepository
{

    /**
     * @var \Modules\CouponProducts\Http\Filters\CouponProductFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\CouponProducts\Http\Filters\CouponProductFilter $filter
     */
    public function __construct(CouponProductFilter $filter)
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
        return CouponProduct::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\CouponProducts\Entities\CouponProduct
     */
    public function create(array $data)
    {
        $data['type'] = $data['type'] ==0 ? 'included' : 'excluded';

        $couponProduct = CouponProduct::create($data);

        return $couponProduct;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Category
     */
    public function find($model)
    {
        if ($model instanceof CouponProduct) {
            return $model;
        }

        return CouponProduct::findOrFail($model);
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
        $data['type'] = $data['type'] ==0 ? 'included' : 'excluded';

        $couponProduct = $this->find($model);

        $couponProduct->update($data);

        return $couponProduct;
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
}
