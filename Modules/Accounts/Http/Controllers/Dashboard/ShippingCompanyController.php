<?php

namespace Modules\Accounts\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Accounts\Http\Requests\AddressRequest;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Accounts\Http\Requests\ShippingCompanyRequest;
use Modules\Accounts\Http\Requests\ShippingCompanyOwnerRequest;
use Modules\Accounts\Repositories\ShippingCompanyOwnerRepository;
use Modules\Accounts\Http\Filters\ShippingCompanyFilter;
use Modules\Accounts\Repositories\ShippingCompanyRepository;

/**
 * Class ShippingCompanyController.
 */
class ShippingCompanyController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;


    /**
     * @var \Modules\ShippingCompanies\Repositories\ShippingCompanyRepository
     */
    private $repository;

    /**
     * ShippingCompaniesController constructor.
     * @param ShippingCompanyOwnerRepository $repository
     */
    public function __construct(ShippingCompanyOwnerRepository $repository)
    {
        $this->authorizeResource(ShippingCompany::class, 'shipping_company');

        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\AddressRequest $request
     * @param \Modules\Accounts\Entities\Customer $shippingCompanyOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShippingCompanyRequest $request, ShippingCompanyOwner $shippingCompanyOwner)
    {
//        dd($request);
        $this->repository->createShippingCompany($shippingCompanyOwner, $request->all());
        flash(trans('accounts::shipping_company.messages.created'));

        return redirect()->route('dashboard.shipping_company_owners.show', $shippingCompanyOwner);
    }

    /**
     * @param ShippingCompanyOwner $shippingCompanyOwner
     * @param ShippingCompany $shippingCompany
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ShippingCompanyOwner $shippingCompanyOwner, ShippingCompany $shippingCompany)
    {
        return view('accounts::shipping_companies.edit', compact('shippingCompanyOwner', 'shippingCompany'));
    }

    /**
     * @param ShippingCompanyRequest $request
     * @param ShippingCompanyOwner $shippingCompanyOwner
     * @param ShippingCompany $shippingCompany
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShippingCompanyRequest $request, ShippingCompanyOwner $shippingCompanyOwner, ShippingCompany $shippingCompany)
    {
        $this->repository->updateShippingCompany($shippingCompany, $request->all());

        flash(trans('accounts::shipping_companies.messages.updated'));

        return redirect()->route('dashboard.shipping_company_owners.show', $shippingCompanyOwner);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(ShippingCompanyOwner $shippingCompanyOwner, ShippingCompany $shippingCompany)
    {
        $this->repository->deleteShippingCompany($shippingCompany);

        flash(trans('accounts::shipping_companies.messages.deleted'));

        return redirect()->route('dashboard.shipping_company_owners.show', $shippingCompanyOwner);
    }
}
