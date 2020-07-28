<?php

namespace Modules\CustomFieldOptions\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;
use Modules\CustomFieldOptions\Http\Filters\CustomFieldOptionFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class CustomFieldOptionRepository implements CrudRepository
{

    /**
     * @var \Modules\CustomFieldOptions\Http\Filters\CustomFieldOptionFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\CustomFieldOptions\Http\Filters\CustomFieldOptionFilter $filter
     */
    public function __construct(CustomFieldOptionFilter $filter)
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
        return CustomFieldOption::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\CustomFieldOptions\Entities\CustomFieldOption
     */
    public function create(array $data)
    {
        $customFieldOption = CustomFieldOption::create($data);

        return $customFieldOption;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\CustomFieldOptions\Entities\CustomFieldOption
     */
    public function find($model)
    {
        if ($model instanceof CustomFieldOption) {
            return $model;
        }

        return CustomFieldOption::findOrFail($model);
    }

    /**
     * Update the given client in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $customFieldOption = $this->find($model);

        $customFieldOption->update($data);

        return $customFieldOption;
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
