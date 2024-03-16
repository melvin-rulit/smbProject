<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'type' => $this->resource->type,
            'kind' => $this->resource->kind,
            'proxy_id' => $this->resource->proxy_id,
            'owner_id' => $this->resource->owner_id,
            'branch_id' => $this->resource->branch_id,
            'client_id' => $this->resource->client_id,
            'client' => ClientResource::make($this->resource->client),
            'active_id' => $this->resource->active_id,
            'active' => ActiveResource::make($this->resource->active),
            'remain' => $this->resource->remain,
            'valid_until' => $this->resource->valid_until,
            'cost_of_rent' => $this->resource->cost_of_rent,
            'cost_of_buyout' => $this->resource->cost_of_buyout,
            'comment' => $this->resource->comment,
            'initial' => $this->resource->initial,
            'citizenship' => $this->resource->citizenship,
            'payments' => PaymentResource::collection($this->resource->payments),
            'created_at' => Carbon::createFromDate($this->resource->created_at)->format('d,m,Y')
        ];
    }
}
