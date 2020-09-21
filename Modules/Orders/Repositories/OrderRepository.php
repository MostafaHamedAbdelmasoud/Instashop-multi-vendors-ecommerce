<?php

namespace Modules\Orders\Repositories;

use Modules\Orders\Entities\Order;
use Modules\Contracts\CrudRepository;
use Modules\Accounts\Entities\Address;
use Modules\Accounts\Entities\Customer;
use Modules\Orders\Http\Filters\OrderFilter;
use Modules\Orders\Entities\OrderStatusUpdate;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class OrderRepository implements CrudRepository
{

    /**
     * @var \Modules\Orders\Http\Filters\OrderFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\Orders\Http\Filters\OrderFilter $filter
     */
    public function __construct(OrderFilter $filter)
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
        return Order::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Orders\Entities\Order
     */
    public function create(array $data)
    {
        $customer = Customer::where('id', $data['user_id'])->first();

        $address_id = Address::where('user_id', $customer->id)->where('is_primary', 1)->first()->id;
        $data['address_id'] = $address_id;

        $order = Order::create($data);

        return $order;
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @param Order $order
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function CreateOrderStatusUpdate(array $data, Order $order)
    {
        return $order->orderStatusUpdates()->create($data);
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Category
     */
    public function find($model)
    {
        if ($model instanceof Order) {
            return $model;
        }

        return Order::findOrFail($model);
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Category
     */
    public function findOrderStatusUpdate($model)
    {
        if ($model instanceof OrderStatusUpdate) {
            return $model;
        }

        return OrderStatusUpdate::findOrFail($model);
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
        $address = Address::where('id', $data['address_id'])->first();

        $customer_id = Customer::where('id', $address->user_id)->first()->id;

        $data['user_id'] = $customer_id;

        $order = $this->find($model);

        $order->update($data);

        return $order;
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
    public function updateOrderStatusUpdate($model, array $data)
    {
        $orderStatusUpdate = $this->findOrderStatusUpdate($model);

        $orderStatusUpdate->update($data);

        return $orderStatusUpdate;
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
     * Delete the given client from storage.
     *
     * @param mixed $model
     * @throws \Exception
     * @return void
     */
    public function deleteOrderStatusUpdate($model)
    {
        $this->findOrderStatusUpdate($model)->delete();
    }
}
