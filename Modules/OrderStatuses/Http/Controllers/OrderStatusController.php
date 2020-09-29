<?php

namespace Modules\OrderStatuses\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Customer;
use Modules\OrderStatuses\Entities\OrderStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\OrderStatuses\Http\Requests\OrderStatusRequest;
use Modules\OrderStatuses\Repositories\OrderStatusRepository;

/**
 * Class OrderController.
 */
class OrderStatusController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var OrderStatusRepository
     */
    private $repository;

    /**
     * Customer Controller constructor.
     *
     * @param OrderStatusRepository $repository
     */
    public function __construct(OrderStatusRepository $repository)
    {
        $this->authorizeResource(OrderStatus::class, 'order_status');

        $this->repository = $repository;
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orderStatuses = $this->repository->all();

        return view('order_statuses::order_statuses.index', compact('orderStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('order_statuses::order_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\OrderStatuses\Http\Requests\OrderStatusRequest $request
     * @param \Modules\OrderStatuses\Entities\Customer $orderStatusOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderStatusRequest $request)
    {
        $orderStatus = $this->repository->create($request->all());

        flash(trans('order_statuses::order_statuses.messages.created'));

        return redirect()->route('dashboard.order_statuses.show', $orderStatus);
    }

    /**
     * @param OrderStatus $orderStatus
     *
     */
    public function show(OrderStatus $orderStatus)
    {
        $orderStatus = $this->repository->find($orderStatus);

        return view('order_statuses::order_statuses.show', compact('orderStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\OrderStatuses\Http\Requests\OrderStatusRequest $request
     * @param \Modules\OrderStatuses\Entities\Customer $orderStatusOwner
     * @param \Modules\OrderStatuses\Entities\Store $orderStatus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderStatusRequest $request, OrderStatus $orderStatus)
    {
        $this->repository->update($orderStatus, $request->all());

        flash(trans('order_statuses::order_statuses.messages.updated'));

        return redirect()->route('dashboard.order_statuses.show', $orderStatus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @param OrderStatus $orderStatus
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $customer, OrderStatus $orderStatus)
    {
        return view('order_statuses::order_statuses.edit', compact('customer', 'orderStatus'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\OrderStatuses\Entities\Customer $customer
     * @param \Modules\OrderStatuses\Entities\Store $orderStatus
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer, OrderStatus $orderStatus)
    {
        $this->repository->delete($orderStatus);

        flash(trans('order_statuses::order_statuses.messages.deleted'));

        return redirect()->route('dashboard.order_statuses.index');
    }
}
