<?php

namespace Modules\CustomFields\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Modules\Categories\Entities\Categories */
class SelectCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->name,
        ];
    }
}
