<?php

namespace Modules\Accounts\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\ShippingCompanyOwner;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Accounts\Http\Requests\ShippingCompanyOwnerRequest;
use Modules\Accounts\Repositories\ShippingCompanyOwnerRepository;

/**
 * Class ShippingCompanyOwnerController.
 */
class ShippingCompanyOwnerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var \Modules\Accounts\Repositories\ShippingCompanyOwnerRepository
     */
    private $repository;

    /**
     * ShippingCompanyOwnerController constructor.
     *
     * @param \Modules\Accounts\Repositories\ShippingCompanyOwnerRepository $repository
     */
    public function __construct(ShippingCompanyOwnerRepository $repository)
    {
        $this->authorizeResource(ShippingCompanyOwner::class, 'shipping_company_owner');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $shippingCompanyOwners = $this->repository->all();

        return view('accounts::shipping_company_owners.index', compact('shippingCompanyOwners'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('accounts::shipping_company_owners.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ShippingCompanyOwnerRequest $request)
    {
        $shippingCompanyOwner = $this->repository->create($request->allWithHashedPassword());

        flash(trans('accounts::shipping_company_owners.messages.created'));

        return redirect()->route('dashboard.shipping_company_owners.show', $shippingCompanyOwner);
    }

    /**
     * Show the specified resource.
     * @param \Modules\Accounts\Entities\ShippingCompanyOwner $shippingCompanyOwner
     * @return \Illuminate\Http\Response
     * @return Response
     */
    public function show(ShippingCompanyOwner $shippingCompanyOwner)
    {
        $shippingCompanyOwner = $this->repository->find($shippingCompanyOwner);

        $shippingCompanies = $shippingCompanyOwner->ShippingCompanies()->with(['ShippingCompanyPrices'])->paginate();

        return view('accounts::shipping_company_owners.show', compact('shippingCompanyOwner', 'shippingCompanies'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param \Modules\Accounts\Entities\ShippingCompanyOwner $shippingCompanyOwner
     * @return Response
     */
    public function edit(ShippingCompanyOwner $shippingCompanyOwner)
    {
        $shippingCompanyOwner = $this->repository->find($shippingCompanyOwner);

        return view('accounts::shipping_company_owners.edit', compact('shippingCompanyOwner'));
    }

    /**
     * Update the specified resource in storage.
     * @param ShippingCompanyOwnerRequest $request
     * @param ShippingCompanyOwner $shippingCompanyOwner
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShippingCompanyOwnerRequest $request, ShippingCompanyOwner $shippingCompanyOwner)
    {
        $shippingCompanyOwner = $this->repository->update($shippingCompanyOwner, $request->allWithHashedPassword());

        flash(trans('accounts::shipping_company_owners.messages.updated'));

        return redirect()->route('dashboard.shipping_company_owners.show', $shippingCompanyOwner);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(ShippingCompanyOwner $shippingCompanyOwner)
    {
        //
        $this->repository->delete($shippingCompanyOwner);

        flash(trans('accounts::shipping_company_owners.messages.deleted'));

        return redirect()->route('dashboard.shipping_company_owners.index');
    }
}
