<?php

namespace Modules\Accounts\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Accounts\Http\Requests\AddressRequest;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Modules\Accounts\Entities\ShippingCompanyPrice;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Accounts\Http\Filters\ShippingCompanyFilter;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Accounts\Http\Requests\ShippingCompanyRequest;
use Modules\Accounts\Repositories\ShippingCompanyRepository;
use Modules\Accounts\Http\Requests\ShippingCompanyOwnerRequest;
use Modules\Accounts\Http\Requests\ShippingCompanyPriceRequest;
use Modules\Accounts\Repositories\ShippingCompanyOwnerRepository;

/**
 * Class ShippingCompanyController.
 */
class ShippingCompanyPriceController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;


    /**
     * Store a newly created resource in storage.
     *
     * @param ShippingCompanyPriceRequest $request
     * @param ShippingCompany $shippingCompany
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShippingCompanyPriceRequest $request, ShippingCompany $shippingCompany)
    {
//        dd($request);
        $shippingCompany->ShippingCompanyPrices()->create($request->all());

        flash(trans('accounts::shipping_company_prices.messages.created'));

        return redirect()->route('dashboard.shipping_company.show', $shippingCompany);
    }


    /**
     * @param ShippingCompany $shippingCompany
     * @param ShippingCompanyPrice $shippingCompanyPrice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ShippingCompany $shippingCompany, ShippingCompanyPrice $shippingCompanyPrice)
    {
        return view('accounts::shipping_companies_prices.edit', compact('shippingCompany', 'shippingCompanyPrice'));
    }

    /**
     * @param ShippingCompanyRequest $request
     * @param ShippingCompanyOwner $shippingCompanyOwner
     * @param ShippingCompany $shippingCompany
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShippingCompanyPriceRequest $request, ShippingCompany $shippingCompany, ShippingCompanyPrice $shippingCompanyPrice)
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
