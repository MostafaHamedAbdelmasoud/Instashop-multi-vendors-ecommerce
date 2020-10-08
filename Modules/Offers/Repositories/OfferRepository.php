<?php

namespace Modules\Offers\Repositories;

use Modules\Offers\Entities\Offer;
use Modules\Contracts\CrudRepository;
use Modules\Offers\Http\Filters\OfferFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class OfferRepository implements CrudRepository
{

    /**
     * @var \Modules\Offers\Http\Filters\OfferFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\Offers\Http\Filters\OfferFilter $filter
     */
    public function __construct(OfferFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all clients as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Offer::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Offers\Entities\Offer
     */
    public function create(array $data)
    {
        //
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @param $model
     * @return \Modules\Offers\Entities\Offer
     */
    public function createOffer(array $data, $model)
    {
        if ($model == 'category') {
            $data['model_type'] = 'category';
        } elseif ($model == 'product') {
            $data['model_type'] = 'product';
        } else {
            $data['model_type'] = 'store';
        }

        return Offer::create($data);
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Offers\Entities\Offer
     */
    public function find($model)
    {
        if ($model instanceof Offer) {
            return $model;
        }

        return Offer::findOrFail($model);
    }

    /**
     * Update the given client in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $offer = $this->find($model);

        $offer->update($data);

        return $offer;
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
}
