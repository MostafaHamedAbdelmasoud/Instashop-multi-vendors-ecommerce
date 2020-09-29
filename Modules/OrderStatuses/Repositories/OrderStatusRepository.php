<?php

namespace Modules\OrderStatuses\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Accounts\Entities\Address;
use Modules\Accounts\Entities\Customer;
use Modules\OrderStatuses\Entities\OrderStatus;
use Modules\OrderStatuses\Http\Filters\OrderStatusFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class OrderStatusRepository implements CrudRepository
{

    /**
     * @var \Modules\OrderStatuses\Http\Filters\OrderStatusFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\OrderStatuses\Http\Filters\OrderStatusFilter $filter
     */
    public function __construct(OrderStatusFilter $filter)
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
        return OrderStatus::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\OrderStatuses\Entities\OrderStatus
     */
    public function create(array $data)
    {
        $orderStatus = OrderStatus::create($data);

        return $orderStatus;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Category
     */
    public function find($model)
    {
        if ($model instanceof OrderStatus) {
            return $model;
        }

        return OrderStatus::findOrFail($model);
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
        $orderStatus = $this->find($model);

        $orderStatus->update($data);

        return $orderStatus;
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
