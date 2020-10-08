<?php

namespace Modules\TemplateBanners\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\StoreOwner;
use Illuminate\Contracts\Foundation\Application;
use Modules\TemplateBanners\Entities\TemplateBanner;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\TemplateBanners\Http\Requests\TemplateBannerRequest;
use Modules\TemplateBanners\Repositories\TemplateBannerRepository;

/**
 * Class ProductController.
 */
class TemplateBannerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var TemplateBannerRepository
     */
    private $repository;

    /**
     * Customer Controller constructor.
     *
     * @param TemplateBannerRepository $repository
     */
    public function __construct(TemplateBannerRepository $repository)
    {
        $this->authorizeResource(TemplateBanner::class, 'template_banner');

        $this->repository = $repository;
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $template_banners = $this->repository->all();

        return view('template_banners::template_banners.index', compact('template_banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('template_banners::template_banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\TemplateBanners\Http\Requests\TemplateBannerRequest $request
     * @param \Modules\TemplateBanners\Entities\Customer $templateBannerOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TemplateBannerRequest $request)
    {
        $templateBanner = $this->repository->create($request->all());

        flash(trans('template_banners::template_banners.messages.created'));

        return redirect()->route('dashboard.template_banners.show', $templateBanner);
    }

    /**
     * @param TemplateBanner $templateBanner
     *
     */
    public function show(TemplateBanner $templateBanner)
    {
        $templateBanner = $this->repository->find($templateBanner);

        return view('template_banners::template_banners.show', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\TemplateBanners\Http\Requests\TemplateBannerRequest $request
     * @param \Modules\TemplateBanners\Entities\Customer $templateBannerOwner
     * @param \Modules\TemplateBanners\Entities\Store $templateBanner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TemplateBannerRequest $request, TemplateBanner $templateBanner)
    {
        $this->repository->update($templateBanner, $request->all());

        flash(trans('template_banners::template_banners.messages.updated'));

        return redirect()->route('dashboard.template_banners.show', $templateBanner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $storeOwner
     * @param TemplateBanner $templateBanner
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $storeOwner, TemplateBanner $templateBanner)
    {
        return view('template_banners::template_banners.edit', compact('storeOwner', 'coupon'));
    }

    /**
     * Remove the specified resource from storage.
     * @param StoreOwner $storeOwner
     * @param TemplateBanner $templateBanner
     *@throws \Exception
     *@return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, TemplateBanner $templateBanner)
    {
        $this->repository->delete($templateBanner);

        flash(trans('template_banners::template_banners.messages.deleted'));

        return redirect()->route('dashboard.template_banners.index');
    }
}
