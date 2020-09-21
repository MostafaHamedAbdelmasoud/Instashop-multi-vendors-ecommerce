<?php

namespace Modules\Orders\Http\Controllers;

use http\Env\Request;
use Illuminate\Routing\Controller;
use Modules\Orders\Entities\Order;
use Modules\Accounts\Entities\Customer;
use Modules\Orders\Entities\OrderStatusUpdate;
use Illuminate\Contracts\Foundation\Application;
use Modules\Orders\Repositories\OrderRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Orders\Http\Requests\OrderStatusUpdateRequest;
use Modules\Orders\Repositories\OrderStatusUpdateRepository;

/**
 * Class OrderController.
 */
class OrderStatusUpdateController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var OrderRepository
     */
    private $repository;

    /**
     * Customer Controller constructor.
     *
     * @param OrderRepository $repository
     */
    public function __construct(OrderRepository $repository)
    {
        $this->authorizeResource(OrderStatusUpdate::class, 'order_status_update');

        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Orders\Http\Requests\OrderRequest $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderStatusUpdateRequest $request, Order $order)
    {
        $this->repository->createOrderStatusUpdate($request->all(), $order);

        flash(trans('orders::order_status_updates.messages.created'));

        return redirect()->route('dashboard.orders.show', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderStatusUpdateRequest $request
     * @param Order $order
     * @param OrderStatusUpdate $orderStatusUpdate
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderStatusUpdateRequest $request, Order $order, OrderStatusUpdate $orderStatusUpdate)
    {
        $this->repository->updateOrderStatusUpdate($orderStatusUpdate, $request->all());

        flash(trans('orders::order_status_updates.messages.updated'));

        return redirect()->route('dashboard.orders.show', $orderStatusUpdate->order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @param OrderStatusUpdate $orderStatusUpdate
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Order $order, OrderStatusUpdate $orderStatusUpdate)
    {
        return view('orders::order_status_updates.edit', compact('order', 'orderStatusUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @param OrderStatusUpdate $orderStatusUpdate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Order $order, OrderStatusUpdate $orderStatusUpdate)
    {
        $this->repository->deleteOrderStatusUpdate($orderStatusUpdate);

        flash(trans('orders::order_status_updates.messages.deleted'));

        return redirect()->route('dashboard.orders.show', compact('order'));
    }
}
