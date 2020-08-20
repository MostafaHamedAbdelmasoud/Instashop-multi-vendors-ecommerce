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
        $coupon = CouponProduct::create($data);

        return $coupon;
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
        $coupon = $this->find($model);

        $coupon->update($data);

        return $coupon;
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
