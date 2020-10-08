<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\StoreOwner;
use Modules\Categories\Entities\Category;
use Modules\Categories\Http\Requests\CategoryRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Categories\Repositories\CategoryRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Stores\Entities\Store;

/**
 * Class CategoryController.
 */
class CategoryController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * The repository instance.
     *
     * @var \Modules\Categories\Repositories\CategoryRepository
     */
    private $repository;

    /**
     * StoreOwnerController constructor.
     *
     * @param \Modules\Categories\Repositories\CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->authorizeResource(Category::class, 'category');

        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->repository->all();

        return view('categories::categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('categories::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Categories\Http\Requests\CategoryRequest $request
     * @param \Modules\Categories\Entities\StoreOwner $categoryOwner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->repository->create($request->all());

        flash(trans('categories::categories.messages.created'));

        return redirect()->route('dashboard.categories.show', $category);
    }

    /**
     * @param Category $category
     *
     */
    public function show(Category $category)
    {
        $category = $this->repository->find($category);

        return view('categories::categories.show', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Categories\Http\Requests\CategoryRequest $request
     * @param \Modules\Categories\Entities\StoreOwner $categoryOwner
     * @param \Modules\Categories\Entities\Store $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->repository->update($category, $request->all());

        flash(trans('categories::categories.messages.updated'));

        return redirect()->route('dashboard.categories.show', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreOwner $storeOwner
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StoreOwner $storeOwner, Category $category)
    {
        return view('categories::categories.edit', compact('storeOwner', 'category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Categories\Entities\StoreOwner $categoryOwner
     * @param \Modules\Categories\Entities\Store $category
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoreOwner $storeOwner, Category $category)
    {
        $this->repository->delete($category);

        flash(trans('categories::categories.messages.deleted'));

        return redirect()->route('dashboard.categories.index');
    }
}
