<?php

namespace Modules\Countries\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Modules\Countries\Entities\City */
class SelectCityResource extends JsonResource
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
            'text' => $this->country->name.' - '.$this->name,
            'image' => $this->country->getFirstMediaUrl('flags'),
        ];
    }
}
