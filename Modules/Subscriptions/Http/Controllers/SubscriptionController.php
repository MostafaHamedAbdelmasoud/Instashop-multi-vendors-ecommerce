<?php

namespace Modules\Subscriptions\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Admin;
use Illuminate\Contracts\View\Factory;
use Modules\Accounts\Entities\StoreOwner;
use Illuminate\Contracts\Foundation\Application;
use Modules\Subscriptions\Entities\Subscription;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Subscriptions\Http\Requests\SubscriptionRequest;
use Modules\Subscriptions\Entities\Helpers\SubscriptionHelper;
use Modules\Subscriptions\Repositories\SubscriptionRepository;

/**
 * Class CategoryController.
 */
class SubscriptionController extends Controller
{
    use AuthorizesRequests, ValidatesRequests, SubscriptionHelper;

    /**
     * The repository instance.
     *
     * @var SubscriptionRepository
     */
    private $repository;

    /**
     * StoreOwnerController constructor.
     *
     * @param SubscriptionRepository $repository
     */
    public function __construct(SubscriptionRepository $repository)
    {
        $this->authorizeResource(Subscription::class, 'subscription');

        $this->repository = $repository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $subscriptions = $this->repository->all();

        return view('subscriptions::subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Http\Response|View
     */
    public function create()
    {
        return view('subscriptions::subscriptions.create');
    }

    /**
     * Show the form for creating a new shipping company.
     *
     * @return Application|Factory|\Illuminate\Http\Response|View
     */
    public function create_shipping_company()
    {
        return view('subscriptions::subscriptions.shipping_companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Subscriptions\Http\Requests\SubscriptionRequest $request
     * @param \Modules\Subscriptions\Entities\StoreOwner $subscriptionOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SubscriptionRequest $request)
    {
        $subscription = $this->repository->create($request->all());

        flash(trans('subscriptions::subscriptions.messages.created'));

        return redirect()->route('dashboard.subscriptions.show', $subscription);
    }

    /**
     * @param Subscription $subscription
     *
     */
    public function show(Subscription $subscription)
    {
        $subscription = $this->repository->find($subscription);

        return view('subscriptions::subscriptions.show', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Subscriptions\Http\Requests\SubscriptionRequest $request
     * @param \Modules\Subscriptions\Entities\StoreOwner $subscriptionOwner
     * @param \Modules\Subscriptions\Entities\Store $subscription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SubscriptionRequest $request, Subscription $subscription)
    {
        $this->repository->update($subscription, $request->all());

        flash(trans('subscriptions::subscriptions.messages.updated'));

        return redirect()->route('dashboard.subscriptions.show', $subscription);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Admin $admin
     * @param Subscription $subscription
     * @return Application|Factory|View
     */
    public function edit(Admin $admin, Subscription $subscription)
    {
        return view('subscriptions::subscriptions.edit', compact('admin', 'subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Admin $admin
     * @param Subscription $subscription
     * @return Application|Factory|View
     */
    public function edit_shipping_company(Admin $admin, Subscription $subscription)
    {
        return view('subscriptions::subscriptions.shipping_companies.edit', compact('admin', 'subscription'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $admin
     * @param Subscription $subscription
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admin $admin, Subscription $subscription)
    {
        $this->repository->delete($subscription);

        flash(trans('subscriptions::subscriptions.messages.deleted'));

        return redirect()->route('dashboard.subscriptions.index');
    }
}
