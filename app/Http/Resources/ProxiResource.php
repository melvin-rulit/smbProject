<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProxiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
           'id'           => $this->resource->id,
           'delegate'     => UserResource::make($this->resource->delegate),
           'owner'        => UserResource::make($this->resource->owner),
           'number'       => $this->resource->number,
           'valid_until'   => Carbon::create($this->resource->valid_until)->format('d-m-Y'),
           'issued_by'     => $this->resource->issued_by,
           'issued_number' => $this->resource->issued_number,
       ];
    }
}
