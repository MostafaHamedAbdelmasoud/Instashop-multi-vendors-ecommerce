<?php

namespace Modules\Accounts\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Admin;
use Modules\Accounts\Http\Requests\AdminRequest;
use Modules\Accounts\Repositories\AdminRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var \Modules\Accounts\Repositories\AdminRepository
     */
    private $repository;

    /**
     * AdminController constructor.
     *
     * @param \Modules\Accounts\Repositories\AdminRepository $repository
     */
    public function __construct(AdminRepository $repository)
    {
        $this->authorizeResource(Admin::class, 'admin');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = $this->repository->all();

        return view('accounts::admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts::admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\AdminRequest $request
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminRequest $request)
    {
        $admin = $this->repository->create($request->allWithHashedPassword());

        flash(trans('accounts::admins.messages.created'));

        return redirect()->route('dashboard.admins.show', $admin);
    }

    /**
     * Display the specified resource.
     *
     * @param \Modules\Accounts\Entities\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $admin = $this->repository->find($admin);

        return view('accounts::admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Accounts\Entities\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $admin = $this->repository->find($admin);

        return view('accounts::admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Accounts\Http\Requests\AdminRequest $request
     * @param \Modules\Accounts\Entities\Admin $admin
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $admin = $this->repository->update($admin, $request->allWithHashedPassword());

        flash(trans('accounts::admins.messages.updated'));

        return redirect()->route('dashboard.admins.show', $admin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Accounts\Entities\Admin $admin
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admin $admin)
    {
        $this->repository->delete($admin);

        flash(trans('accounts::admins.messages.deleted'));

        return redirect()->route('dashboard.admins.index');
    }
}
