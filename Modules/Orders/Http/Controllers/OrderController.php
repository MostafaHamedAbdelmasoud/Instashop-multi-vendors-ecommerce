<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Orders\Entities\Order;
use Modules\Accounts\EntitiesCustomer;
use Modules\Accounts\Entities\Customer;
use Modules\Orders\Entities\OrderStatusUpdate;
use Modules\Orders\Http\Requests\OrderRequest;
use Illuminate\Contracts\Foundation\Application;
use Modules\Orders\Repositories\OrderRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class OrderController.
 */
class OrderController extends Controller
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
        $this->authorizeResource(Order ::class, 'order');

        $this->repository = $repository;
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = $this->repository->all();

        return view('orders::orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders::orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Orders\Http\Requests\OrderRequest $request
     * @param \Modules\Orders\Entities\Customer $orderOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderRequest $request)
    {
        $order = $this->repository->create($request->all());

        flash(trans('orders::orders.messages.created'));

        return redirect()->route('dashboard.orders.show', $order);
    }

    /**
     * @param Order $order
     *
     */
    public function show(Order $order)
    {
        $order = $this->repository->find($order);

        $orderStatusUpdates = OrderStatusUpdate::where('order_id', $order->id)->paginate();

        return view('orders::orders.show', compact('order', 'orderStatusUpdates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Orders\Http\Requests\OrderRequest $request
     * @param \Modules\Orders\Entities\Customer $orderOwner
     * @param \Modules\Orders\Entities\Store $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderRequest $request, Order $order)
    {
        $this->repository->update($order, $request->all());

        flash(trans('orders::orders.messages.updated'));

        return redirect()->route('dashboard.orders.show', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @param Order $order
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $customer, Order $order)
    {
        return view('orders::orders.edit', compact('customer', 'order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Orders\Entities\Customer $customer
     * @param \Modules\Orders\Entities\Store $order
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer, Order $order)
    {
        $this->repository->delete($order);

        flash(trans('orders::orders.messages.deleted'));

        return redirect()->route('dashboard.orders.index');
    }
}
