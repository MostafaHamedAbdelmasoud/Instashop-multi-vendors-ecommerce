<?php

namespace Modules\OrderProducts\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Customer;
use Illuminate\Contracts\Foundation\Application;
use Modules\OrderProducts\Entities\OrderProduct;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\OrderProducts\Http\Requests\OrderProductRequest;
use Modules\OrderProducts\Repositories\OrderProductRepository;

/**
 * Class ProductController.
 */
class OrderProductController extends Controller
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
        $this->authorizeResource(OrderProduct::class, 'order_product');

        $this->repository = $repository;
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orderProducts = $this->repository->all();

        return view('order_products::order_products.index', compact('orderProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('order_products::order_products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\OrderProducts\Http\Requests\OrderProductRequest $request
     * @param \Modules\OrderProducts\Entities\StoreOwner $orderProductOwner
     * @return string
     */
    public function store(OrderProductRequest $request)
    {
        $orderProductDuplicated = $this->repository->checkIfRecordExist($request->all());

        if ($orderProductDuplicated != null) {
            flash(trans('order_products::order_products.additions.duplicate'))->error();

            return route('dashboard.order_products.create');
        }
        $orderProduct = $this->repository->create($request->all());

        flash(trans('order_products::order_products.messages.created'));

        return redirect()->route('dashboard.order_products.show', $orderProduct);
    }

    /**
     * @param OrderProduct $orderProduct
     *
     */
    public function show(OrderProduct $orderProduct)
    {
        $orderProduct = $this->repository->find($orderProduct);

        $orderProductFieldValues = $orderProduct->orderProductFieldValues()->paginate();

        return view('order_products::order_products.show', compact('orderProduct', 'orderProductFieldValues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\OrderProducts\Http\Requests\OrderProductRequest $request
     * @param \Modules\OrderProducts\Entities\StoreOwner $orderProductOwner
     * @param \Modules\OrderProducts\Entities\Store $orderProduct
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderProductRequest $request, OrderProduct $orderProduct)
    {
        $this->repository->update($orderProduct, $request->all());

        flash(trans('order_products::order_products.messages.updated'));

        return redirect()->route('dashboard.order_products.show', $orderProduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreOwner $customer
     * @param OrderProduct $orderProduct
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $customer, OrderProduct $orderProduct)
    {
        return view('order_products::order_products.edit', compact('customer', 'orderProduct'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\OrderProducts\Entities\StoreOwner $customer
     * @param \Modules\OrderProducts\Entities\Store $orderProduct
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer, OrderProduct $orderProduct)
    {
        $this->repository->delete($orderProduct);

        flash(trans('order_products::order_products.messages.deleted'));

        return redirect()->route('dashboard.order_products.index');
    }
}
