<?php

namespace Modules\OrderProducts\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Customer;
use Illuminate\Contracts\Foundation\Application;
use Modules\OrderProducts\Entities\OrderProduct;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\OrderProducts\Entities\OrderProductFieldValue;
use Modules\OrderProducts\Http\Requests\OrderProductRequest;
use Modules\OrderProducts\Repositories\OrderProductRepository;
use Modules\OrderProducts\Http\Requests\OrderProductFieldValueRequest;

/**
 * Class ProductController.
 */
class OrderProductFieldValueController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var OrderProductRepository
     */
    private $repository;

    /**
     * StoreOwnerController constructor.
     *
     * @param OrderProductRepository $repository
     */
    public function __construct(OrderProductRepository $repository)
    {
        $this->authorizeResource(OrderProductFieldValue::class, 'order_product_field_value');

        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\OrderProducts\Http\Requests\OrderProductRequest $request
     * @param OrderProduct $orderProduct
     * @return string
     */
    public function store(OrderProductFieldValueRequest $request, OrderProduct  $orderProduct)
    {
        $this->repository->createOrderProductFieldValue($request->all(), $orderProduct);

        flash(trans('order_products::order_products.messages.created'));

        return redirect()->route('dashboard.order_products.show', $orderProduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\OrderProducts\Http\Requests\OrderProductRequest $request
     * @param OrderProduct $orderProduct
     * @param OrderProductFieldValue $orderProductFieldValue
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderProductFieldValueRequest $request, OrderProduct $orderProduct, OrderProductFieldValue $orderProductFieldValue)
    {
        $this->repository->updateOrderProductFieldValue($orderProductFieldValue, $request->all());

        flash(trans('order_products::order_products.messages.updated'));

        return redirect()->route('dashboard.order_products.show', $orderProduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrderProduct $orderProduct
     * @param OrderProductFieldValue $orderProductFieldValue
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(OrderProduct $orderProduct, OrderProductFieldValue  $orderProductFieldValue)
    {
        return view('order_products::order_product_field_values.edit', compact('orderProductFieldValue', 'orderProduct'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\OrderProducts\Entities\StoreOwner $customer
     * @param \Modules\OrderProducts\Entities\Store $orderProduct
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(OrderProduct $orderProduct, OrderProductFieldValue  $orderProductFieldValue)
    {
        $this->repository->deleteOrderProductFieldValue($orderProductFieldValue);

        flash(trans('order_products::order_products.messages.deleted'));

        return redirect()->route('dashboard.order_products.show', $orderProduct);
    }
}
