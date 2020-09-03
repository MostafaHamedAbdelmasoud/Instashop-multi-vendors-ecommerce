<?php

namespace Modules\OrderProducts\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Modules\Categories\Entities\Categories */
class SelectOrderResource extends JsonResource
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
            'text' => $this->id,
        ];
    }
}
