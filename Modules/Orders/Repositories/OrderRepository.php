<?php

namespace Modules\Orders\Repositories;

use Modules\Orders\Entities\Order;
use Modules\Contracts\CrudRepository;
use Modules\Orders\Http\Filters\OrderFilter;

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
        $order = Order::create($data);

        $this->uploadAvatar($order, $data);

        return $order;
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
        $order = $this->find($model);

        $this->uploadAvatar($model, $data);

        $order->update($data);

        return $order;
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
     * @param Order $product
     * @param array $data
     * @return Order
     */
    private function uploadAvatar(Order $product, array $data)
    {
        if (isset($data['store'])) {
            $product->addMedia($data['store'])->toMediaCollection('stores');
        }

        return $product;
    }
}
