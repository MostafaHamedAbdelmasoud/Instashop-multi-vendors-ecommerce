<?php

namespace Modules\Subscriptions\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Subscriptions\Entities\Subscription;
use Modules\Subscriptions\Http\Filters\SubscriptionFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class SubscriptionRepository implements CrudRepository
{

    /**
     * @var SubscriptionFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param SubscriptionFilter $filter
     */
    public function __construct(SubscriptionFilter $filter)
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
        return Subscription::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return Subscription
     */
    public function create(array $data)
    {
        $subscription = Subscription::create($data);

        return $subscription;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Category
     */
    public function find($model)
    {
        if ($model instanceof Subscription) {
            return $model;
        }

        return Subscription::findOrFail($model);
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
        $subscription = $this->find($model);

        $subscription->update($data);

        return $subscription;
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
