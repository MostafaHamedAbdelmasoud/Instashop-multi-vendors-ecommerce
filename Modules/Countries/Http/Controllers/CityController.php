<?php

namespace Modules\Countries\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;
use Modules\Countries\Http\Requests\CityRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CityController extends Controller
{
    use AuthorizesRequests;

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Countries\Http\Requests\CityRequest $request
     * @param \Modules\Countries\Entities\Country $country
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CityRequest $request, Country $country)
    {
        $country->cities()->create($request->all());

        flash(trans('countries::cities.messages.created'));

        return redirect()->route('dashboard.countries.show', $country);
    }

    /**
     * Display the city edit form.
     *
     * @param \Modules\Countries\Entities\Country $country
     * @param \Modules\Countries\Entities\City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country, City $city)
    {
        return view('countries::cities.edit', compact('country', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Countries\Http\Requests\CityRequest $request
     * @param \Modules\Countries\Entities\Country $country
     * @param \Modules\Countries\Entities\City $city
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CityRequest $request, Country $country, City $city)
    {
        $country->cities()->findOrFail($city->id)->update($request->all());

        flash(trans('countries::cities.messages.updated'));

        return redirect()->route('dashboard.countries.show', $country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Modules\Countries\Entities\Country $country
     * @param \Modules\Countries\Entities\City $city
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Country $country, City $city)
    {
        $this->authorize('delete', $city);

        $country->cities()->findOrFail($city->id)->delete();

        flash(trans('countries::cities.messages.deleted'));

        return redirect()->route('dashboard.countries.show', $country);
    }
}
