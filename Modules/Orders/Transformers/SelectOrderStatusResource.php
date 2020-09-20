<?php

namespace Modules\Orders\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Modules\Categories\Entities\Categories */
class SelectOrderStatusResource extends JsonResource
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
            'text' => $this->name . ' | '. $this->type,
        ];
    }
}
