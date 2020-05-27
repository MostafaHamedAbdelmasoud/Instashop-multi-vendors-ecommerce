<?php

namespace Modules\Accounts\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Delegate;
use Modules\Accounts\Http\Requests\DelegateRequest;
use Modules\Accounts\Repositories\DelegateRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DelegateController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var \Modules\Accounts\Repositories\DelegateRepository
     */
    private $repository;

    /**
     * DelegateController constructor.
     *
     * @param \Modules\Accounts\Repositories\DelegateRepository $repository
     */
    public function __construct(DelegateRepository $repository)
    {
        $this->authorizeResource(Delegate::class, 'delegate');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delegates = $this->repository->all();

        return view('accounts::delegates.index', compact('delegates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts::delegates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\DelegateRequest $request
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DelegateRequest $request)
    {
        $delegate = $this->repository->create($request->allWithHashedPassword());

        flash(trans('accounts::delegates.messages.created'));

        return redirect()->route('dashboard.delegates.show', $delegate);
    }

    /**
     * Display the specified resource.
     *
     * @param \Modules\Accounts\Entities\Delegate $delegate
     * @return \Illuminate\Http\Response
     */
    public function show(Delegate $delegate)
    {
        $delegate = $this->repository->find($delegate);

        return view('accounts::delegates.show', compact('delegate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Accounts\Entities\Delegate $delegate
     * @return \Illuminate\Http\Response
     */
    public function edit(Delegate $delegate)
    {
        $delegate = $this->repository->find($delegate);

        return view('accounts::delegates.edit', compact('delegate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\DelegateRequest $request
     * @param \Modules\Accounts\Entities\Delegate $delegate
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DelegateRequest $request, Delegate $delegate)
    {
        $delegate = $this->repository->update($delegate, $request->allWithHashedPassword());

        flash(trans('accounts::delegates.messages.updated'));

        return redirect()->route('dashboard.delegates.show', $delegate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Accounts\Entities\Delegate $delegate
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Delegate $delegate)
    {
        $this->repository->delete($delegate);

        flash(trans('accounts::delegates.messages.deleted'));

        return redirect()->route('dashboard.delegates.index');
    }
}
