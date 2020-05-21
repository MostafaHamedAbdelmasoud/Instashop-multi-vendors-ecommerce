<?php

namespace Modules\Accounts\Entities\Helpers;

use Illuminate\Support\Arr;

class helpers
{
    /**
     * @param $model
     * @param null $count
     * @param array $attributes
     * @return \Illuminate\Databasex\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function random_or_create($model, $count = null, $attributes = [])
    {
        $instance = new $model;

        if (! $instance->count()) {
            return factory($model, $count)->create($attributes);
        }

        if (count($attributes)) {
            foreach ($attributes as $key => $value) {
                $instance = $instance->where($key, $value);
            }
        }

        return $instance->get()->random();
    }
}
