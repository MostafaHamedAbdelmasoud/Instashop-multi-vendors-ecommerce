<?php

namespace Modules\Offers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Offers\Entities\Offer;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\StoreOwner;
use Modules\Offers\Http\Requests\OfferRequest;
use Illuminate\Contracts\Foundation\Application;
use Modules\Offers\Repositories\OfferRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class ProductController.
 */
class OfferController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var OfferRepository
     */
    private $repository;

    /**
     * Customer Controller constructor.
     *
     * @param OfferRepository $repository
     */
    public function __construct(OfferRepository $repository)
    {
        $this->authorizeResource(Offer::class, 'offer');

        $this->repository = $repository;
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $offers = $this->repository->all();

        return view('offers::offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('offers::offers.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create_product_offer()
    {
        return view('offers::offers.create_product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create_category_offer()
    {
        return view('offers::offers.create_category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create_store_offer()
    {
        return view('offers::offers.create_store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param null $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OfferRequest $request, $model = null)
    {
        $offer = $this->repository->createOffer($request->all(), $model);

        flash(trans('offers::offers.messages.created'));

        return redirect()->route('dashboard.offers.show', $offer);
    }

    /**
     * @param Offer $offer
     *
     */
    public function show(Offer $offer)
    {
        $offer = $this->repository->find($offer);

        return view('offers::offers.show', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Offers\Http\Requests\OfferRequest $request
     * @param \Modules\Offers\Entities\Customer $offerOwner
     * @param \Modules\Offers\Entities\Store $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OfferRequest $request, Offer $offer)
    {
        $this->repository->update($offer, $request->all());

        flash(trans('offers::offers.messages.updated'));

        return redirect()->route('dashboard.offers.show', $offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $storeOwner
     * @param Offer $offer
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StoreOwner $storeOwner, Offer $offer)
    {
        return view('offers::offers.edit', compact('storeOwner', 'offer'));
    }

    /**
     * Remove the specified resource from storage.
     * @param StoreOwner $storeOwner
     * @param Offer $offer
     *@throws \Exception
     *@return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, Offer $offer)
    {
        $this->repository->delete($offer);

        flash(trans('offers::offers.messages.deleted'));

        return redirect()->route('dashboard.offers.index');
    }
}
