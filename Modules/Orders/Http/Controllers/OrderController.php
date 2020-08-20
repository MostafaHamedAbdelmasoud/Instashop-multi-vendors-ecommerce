<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Orders\Entities\Order;
use Modules\Accounts\EntitiesCustomer ;
use Modules\Accounts\Entities\Customer;
use Modules\Orders\Http\Requests\OrderRequest;
use Illuminate\Contracts\Foundation\Application;
use Modules\Orders\Repositories\OrderRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class ProductController.
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
        $this->authorizeResource(Order::class, 'order');

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
     * @param \Modules\Orders\Entities\Customer $productOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderRequest $request)
    {
        $product = $this->repository->create($request->all());

        flash(trans('orders::orders.messages.created'));

        return redirect()->route('dashboard.orders.show', $product);
    }

    /**
     * @param Order $product
     *
     */
    public function show(Order $product)
    {
        $product = $this->repository->find($product);

        return view('orders::orders.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Orders\Http\Requests\OrderRequest $request
     * @param \Modules\Orders\Entities\Customer $productOwner
     * @param \Modules\Orders\Entities\Store $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $product)
    {
        $this->repository->update($product, $request->all());

        flash(trans('orders::orders.messages.updated'));

        return redirect()->route('dashboard.orders.show', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @param Order $product
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $customer, Order $product)
    {
        return view('orders::orders.edit', compact('storeOwner', 'product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Orders\Entities\Customer $customer
     * @param \Modules\Orders\Entities\Store $product
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer, Order $product)
    {
        $this->repository->delete($product);

        flash(trans('orders::orders.messages.deleted'));

        return redirect()->route('dashboard.orders.index');
    }
}
