<?php

namespace Modules\Countries\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Countries\Entities\Country;
use Modules\Countries\Http\Filters\CityFilter;
use Modules\Countries\Http\Requests\CountryRequest;
use Modules\Countries\Repositories\CountryRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CountryController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var \Modules\Countries\Repositories\CountryRepository
     */
    private $repository;

    /**
     * CountryController constructor.
     *
     * @param \Modules\Countries\Repositories\CountryRepository $repository
     */
    public function __construct(CountryRepository $repository)
    {
        $this->authorizeResource(Country::class, 'country');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = $this->repository->all();

        return view('countries::countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries::countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Countries\Http\Requests\CountryRequest $request
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CountryRequest $request)
    {
        $country = $this->repository->create($request->all());

        flash(trans('countries::countries.messages.created'));

        return redirect()->route('dashboard.countries.show', $country);
    }

    /**
     * Display the specified resource.
     *
     * @param \Modules\Countries\Entities\Country $country
     * @param \Modules\Countries\Http\Filters\CityFilter $filter
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country, CityFilter $filter)
    {
        $this->authorize('view', $country);

        $country = $this->repository->find($country);

        $cities = $this->repository->cities($country);

        return view('countries::countries.show', compact('country', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Modules\Countries\Entities\Country $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries::countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Countries\Http\Requests\CountryRequest $request
     * @param \Modules\Countries\Entities\Country $country
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country = $this->repository->update($country, $request->all());

        flash(trans('countries::countries.messages.updated'));

        return redirect()->route('dashboard.countries.show', $country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Countries\Entities\Country $country
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Country $country)
    {
        $this->repository->delete($country);

        flash(trans('accounts::countries.messages.deleted'));

        return redirect()->route('dashboard.countries.index');
    }
}
