<?php

namespace Modules\Accounts\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Address;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Http\Requests\AddressRequest;
use Modules\Accounts\Http\Requests\CustomerRequest;
use Modules\Accounts\Repositories\CustomerRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AddressController extends Controller
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
        $this->authorizeResource(Address::class, 'address');

        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\AddressRequest $request
     * @param \Modules\Accounts\Entities\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddressRequest $request, Customer $customer)
    {
        $this->repository->createAddress($customer, $request->all());

        flash(trans('accounts::addresses.messages.created'));

        return redirect()->route('dashboard.customers.show', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Accounts\Entities\Customer $customer
     * @param \Modules\Accounts\Entities\Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Address $address)
    {
        return view('accounts::addresses.edit', compact('customer', 'address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\AddressRequest $request
     * @param \Modules\Accounts\Entities\Customer $customer
     * @param \Modules\Accounts\Entities\Address $address
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AddressRequest $request, Customer $customer, Address $address)
    {
        $this->repository->updateAddress($address, $request->all());

        flash(trans('accounts::addresses.messages.updated'));

        return redirect()->route('dashboard.customers.show', $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Accounts\Entities\Customer $customer
     * @param \Modules\Accounts\Entities\Address $address
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer, Address $address)
    {
        $this->repository->deleteAddress($address);

        flash(trans('accounts::addresses.messages.deleted'));

        return redirect()->route('dashboard.customers.show', $customer);
    }
}
