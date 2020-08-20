<?php

namespace Modules\CustomFields\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\StoreOwner;
use Modules\CustomFields\Entities\CustomField;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\CustomFields\Http\Requests\CustomFieldRequest;
use Modules\CustomFields\Repositories\CustomFieldRepository;

/**
 * Class ProductController.
 */
class CustomFieldController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var \Modules\CustomFields\Repositories\CustomFieldRepository
     */
    private $repository;

    /**
     * StoreOwnerController constructor.
     *
     * @param \Modules\CustomFields\Repositories\CustomFieldRepository $repository
     */
    public function __construct(CustomFieldRepository $repository)
    {
        $this->authorizeResource(CustomField::class, 'custom_field');

        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $customFields = $this->repository->all();

        return view('custom_fields::custom_fields.index', compact('customFields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('custom_fields::custom_fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(CustomFieldRequest $request)
    {
        $customField = $this->repository->create($request->all());

        flash(trans('custom_fields::custom_fields.messages.created'));

        return redirect()->route('dashboard.custom_fields.show', $customField);
    }

    /**
     * @param CustomField $customField
     *
     */
    public function show(CustomField $customField)
    {
        $customField = $this->repository->find($customField);

        return view('custom_fields::custom_fields.show', compact('customField'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\CustomFields\Http\Requests\CustomFieldRequest $request
     * @param \Modules\CustomFields\Entities\StoreOwner $customFieldOwner
     * @param \Modules\CustomFields\Entities\Store $customField
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CustomField $customField)
    {
        $this->repository->update($customField, $request->all());

        flash(trans('custom_fields::custom_fields.messages.updated'));

        return redirect()->route('dashboard.custom_fields.show', $customField);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreOwner $storeOwner
     * @param CustomField $customField
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StoreOwner $storeOwner, CustomField $customField)
    {
        return view('custom_fields::custom_fields.edit', compact('storeOwner', 'customField'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Accounts\Entities\StoreOwner $storeOwner
     * @param \Modules\CustomFields\Entities\CustomField $customField
     *@throws \Exception
     *@return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, CustomField $customField)
    {
        $this->repository->delete($customField);

        flash(trans('custom_fields::custom_fields.messages.deleted'));

        return redirect()->route('dashboard.custom_fields.index');
    }
}
