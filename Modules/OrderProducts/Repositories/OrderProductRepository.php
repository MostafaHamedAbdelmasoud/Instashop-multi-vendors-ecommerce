<?php

namespace Modules\OrderProducts\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\OrderProducts\Entities\OrderProduct;
use Modules\OrderProducts\Entities\OrderProductFieldValue;
use Modules\OrderProducts\Http\Filters\OrderProductFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class OrderProductRepository implements CrudRepository
{

    /**
     * @var \Modules\OrderProducts\Http\Filters\OrderProductFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\OrderProducts\Http\Filters\OrderProductFilter $filter
     */
    public function __construct(OrderProductFilter $filter)
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
        return OrderProduct::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(array $data)
    {
        $data['total'] = $data['price'] * $data['quantity'];

        $orderProduct = OrderProduct::create($data);

        return $orderProduct;
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createOrderProductFieldValue(array $data, OrderProduct  $orderProduct)
    {
        return $orderProduct->orderProductFieldValues()->create($data);
    }

    /**
     * check for duplication in model.
     *
     * @param $model
     * @param $data
     * @return mixed
     */
    public function checkIfRecordExist(array $data)
    {
        $orderProduct = OrderProduct::where('product_id', $data['product_id'])
            ->where('order_id', $data['order_id'])->first();

        return $orderProduct;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Category
     */
    public function find($model)
    {
        if ($model instanceof OrderProduct) {
            return $model;
        }

        return OrderProduct::findOrFail($model);
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Category
     */
    public function findOrderProductFieldValue($model)
    {
        if ($model instanceof OrderProductFieldValue) {
            return $model;
        }

        return OrderProductFieldValue::findOrFail($model);
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
        $orderProduct = $this->find($model);

        $orderProduct->update($data);

        return $orderProduct;
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
    public function updateOrderProductFieldValue($model, array $data)
    {
        $orderProductFieldValue = $this->findOrderProductFieldValue($model);

        $orderProductFieldValue->update($data);
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
    public function deleteOrderProductFieldValue($model)
    {
        $model->delete();
    }
}
