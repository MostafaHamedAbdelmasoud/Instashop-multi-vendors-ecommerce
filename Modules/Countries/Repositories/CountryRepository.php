<?php

namespace Modules\Countries\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Countries\Entities\Country;
use Modules\Countries\Http\Filters\CityFilter;
use Modules\Countries\Http\Filters\CountryFilter;

class CountryRepository implements CrudRepository
{
    /**
     * @var \Modules\Accounts\Http\Filters\ClientFilter
     */
    private $filter;

    /**
     * @var \Modules\Countries\Http\Filters\CityFilter
     */
    private $cityFilter;

    /**
     * ClientRepository constructor.
     *
     * @param \Modules\Countries\Http\Filters\CountryFilter $filter
     * @param \Modules\Countries\Http\Filters\CityFilter $cityFilter
     */
    public function __construct(CountryFilter $filter, CityFilter $cityFilter)
    {
        $this->filter = $filter;
        $this->cityFilter = $cityFilter;
    }

    /**
     * Get all clients as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Country::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @return \Modules\Countries\Entities\Country
     */
    public function create(array $data)
    {
        /** @var Country $country */
        $country = Country::create($data);

        $this->uploadFlag($country, $data);

        return $country;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Countries\Entities\Country
     */
    public function find($model)
    {
        if ($model instanceof Country) {
            return $model;
        }

        return Country::findOrFail($model);
    }

    /**
     * Update the given client in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $country = $this->find($model);

        $country->update($data);

        $this->uploadFlag($country, $data);

        return $country;
    }

    /**
     * Delete the given client from storage.
     *
     * @param mixed $model
     * @throws \Exception
     * @return void
     */
    public function delete($model)
    {
        $this->find($model)->delete();
    }

    /**
     * Delete the given client from storage.
     *
     * @param \Modules\Countries\Entities\Country $country
     * @throws \Exception
     * @return \Modules\Countries\Entities\City[]|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function cities(Country $country)
    {
        return $country->cities()->filter($this->cityFilter)->paginate();
    }

    /**
     * Upload the flag image.
     *
     * @param \Modules\Countries\Entities\Country $country
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return \Modules\Countries\Entities\Country
     */
    private function uploadFlag(Country $country, array $data)
    {
        if (isset($data['flag'])) {
            $country->addMedia($data['flag'])->toMediaCollection('flags');
        }

        return $country;
    }
}
