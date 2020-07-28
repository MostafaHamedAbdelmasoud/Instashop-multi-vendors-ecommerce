<?php

namespace Modules\CustomFieldOptions\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\StoreOwner;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;
use Modules\CustomFieldOptions\Http\Requests\CustomFieldOptionRequest;
use Modules\CustomFieldOptions\Repositories\CustomFieldOptionRepository;

/**
 * Class ProductController.
 */
class CustomFieldOptionController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var \Modules\CustomFieldOptions\Repositories\CustomFieldOptionRepository
     */
    private $repository;

    /**
     * StoreOwnerController constructor.
     *
     * @param \Modules\CustomFieldOptions\Repositories\CustomFieldOptionRepository $repository
     */
    public function __construct(CustomFieldOptionRepository $repository)
    {
        $this->authorizeResource(CustomFieldOption::class, 'custom_field_option');

        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $customFieldOptions = $this->repository->all();

        return view('custom_field_options::custom_field_options.index', compact('customFieldOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('custom_field_options::custom_field_options.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CustomFieldOptionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomFieldOptionRequest $request)
    {
        $customFieldOption = $this->repository->create($request->all());

        flash(trans('custom_field_options::custom_field_options.messages.created'));

        return redirect()->route('dashboard.custom_field_options.show', $customFieldOption);
    }

    /**
     * @param CustomFieldOption $customFieldOption
     *
     */
    public function show(CustomFieldOption $customFieldOption)
    {
        $customFieldOption = $this->repository->find($customFieldOption);

        return view('custom_field_options::custom_field_options.show', compact('customFieldOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomFieldOptionRequest $request
     * @param CustomFieldOption $customFieldOption
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CustomFieldOptionRequest $request, CustomFieldOption $customFieldOption)
    {
        $this->repository->update($customFieldOption, $request->all());

        flash(trans('custom_field_options::custom_field_options.messages.updated'));

        return redirect()->route('dashboard.custom_field_options.show', $customFieldOption);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreOwner $storeOwner
     * @param CustomFieldOption $customFieldOption
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StoreOwner $storeOwner, CustomFieldOption $customFieldOption)
    {
        return view('custom_field_options::custom_field_options.edit', compact('storeOwner', 'customFieldOption'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Accounts\Entities\StoreOwner $storeOwner
     * @param \Modules\CustomFieldOptions\Entities\CustomFieldOption $customFieldOption
     *@throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, CustomFieldOption $customFieldOption)
    {
        $this->repository->delete($customFieldOption);

        flash(trans('custom_field_options::custom_field_options.messages.deleted'));

        return redirect()->route('dashboard.custom_field_options.index');
    }
}
