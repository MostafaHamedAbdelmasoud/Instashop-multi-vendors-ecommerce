<?php

namespace Modules\Coupons\Repositories;

use Modules\Coupons\Entities\Coupon;
use Modules\Contracts\CrudRepository;
use Modules\Coupons\Http\Filters\CouponFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class CouponRepository implements CrudRepository
{

    /**
     * @var \Modules\Coupons\Http\Filters\CouponFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\Coupons\Http\Filters\CouponFilter $filter
     */
    public function __construct(CouponFilter $filter)
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
        return Coupon::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Coupons\Entities\Coupon
     */
    public function create(array $data)
    {
        $coupon = Coupon::create($data);

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
        if ($model instanceof Coupon) {
            return $model;
        }

        return Coupon::findOrFail($model);
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
