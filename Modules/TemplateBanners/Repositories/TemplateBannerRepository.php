<?php

namespace Modules\TemplateBanners\Repositories;

use Modules\TemplateBanners\Entities\TemplateBanner;
use Modules\Contracts\CrudRepository;
use Modules\TemplateBanners\Http\Filters\TemplateBannerFilter;

/**
 * Class ShippingCompanyOwnerRepository.
 */
class TemplateBannerRepository implements CrudRepository
{

    /**
     * @var \Modules\TemplateBanners\Http\Filters\TemplateBannerFilter
     */
    private $filter;

    /**
     * ShippingCompanyOwnerRepository constructor.
     *
     * @param \Modules\TemplateBanners\Http\Filters\TemplateBannerFilter $filter
     */
    public function __construct(TemplateBannerFilter $filter)
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
        return TemplateBanner::filter($this->filter)->paginate();
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\TemplateBanners\Entities\TemplateBanner
     */
    public function create(array $data)
    {
        $templateBanner = TemplateBanner::create($data);

        return $templateBanner;
    }

    /**
     * Display the given client instance.
     *
     * @param mixed $model
     * @return \Modules\Accounts\Entities\Category
     */
    public function find($model)
    {
        if ($model instanceof TemplateBanner) {
            return $model;
        }

        return TemplateBanner::findOrFail($model);
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
        $templateBanner = $this->find($model);

        $templateBanner->update($data);

        return $templateBanner;
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
