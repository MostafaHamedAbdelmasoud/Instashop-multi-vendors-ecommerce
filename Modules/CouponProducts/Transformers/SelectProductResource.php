<?php

namespace Modules\CouponProducts\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Modules\Categories\Entities\Categories */
class SelectProductResource extends JsonResource
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
