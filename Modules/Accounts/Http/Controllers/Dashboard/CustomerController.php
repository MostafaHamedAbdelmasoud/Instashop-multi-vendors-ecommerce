<?php

namespace Modules\Accounts\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Http\Requests\CustomerRequest;
use Modules\Accounts\Repositories\CustomerRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var \Modules\Accounts\Repositories\CustomerRepository
     */
    private $repository;

    /**
     * CustomerController constructor.
     *
     * @param \Modules\Accounts\Repositories\CustomerRepository $repository
     */
    public function __construct(CustomerRepository $repository)
    {
        $this->authorizeResource(Customer::class, 'customer');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->repository->all();

        return view('accounts::customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts::customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\CustomerRequest $request
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerRequest $request)
    {
        $customer = $this->repository->create($request->allWithHashedPassword());

        flash(trans('accounts::customers.messages.created'));

        return redirect()->route('dashboard.customers.show', $customer);
    }

    /**
     * Display the specified resource.
     *
     * @param \Modules\Accounts\Entities\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer = $this->repository->find($customer);

        $addresses = $customer->addresses()->with('city')->paginate();

        return view('accounts::customers.show', compact('customer', 'addresses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Accounts\Entities\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customer = $this->repository->find($customer);

        return view('accounts::customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\CustomerRequest $request
     * @param \Modules\Accounts\Entities\Customer $customer
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer = $this->repository->update($customer, $request->allWithHashedPassword());

        flash(trans('accounts::customers.messages.updated'));

        return redirect()->route('dashboard.customers.show', $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Accounts\Entities\Customer $customer
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        $this->repository->delete($customer);

        flash(trans('accounts::customers.messages.deleted'));

        return redirect()->route('dashboard.customers.index');
    }
}
