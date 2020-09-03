<?php

namespace Modules\OrderStatuses\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Modules\Subscriptions\Entities\Subscription */
class SelectCouponResource extends JsonResource
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
            'text' => $this->code,
        ];
    }
}
