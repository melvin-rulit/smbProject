<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActiveResource extends JsonResource
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
            'name' => $this->resource->name,
            'body_number' => $this->resource->body_number,
            'reg_number' => $this->resource->reg_number,
            'year' => $this->resource->year,
            'color_id' => $this->resource->color_id,
            'cost' => $this->resource->cost,
            'cost_of_rent' => $this->resource->cost_of_rent,
            'cost_of_buyout' => $this->resource->cost_of_buyout,
            'branch_id' => $this->resource->branch_id,
            'branch' => BranchResource::make($this->resource->branch),
            'investor_id' => $this->resource->investor_id,
            'investor' => UserResource::make($this->resource->investor),
            'osago' => Carbon::create($this->resource->osago)->format('d-m-Y'),
            'osago_number' => $this->resource->osago_number,
            'document_series' => $this->resource->document_series,
            'document_number' => $this->resource->document_number,
            'document_notes' => $this->resource->document_notes,
            'document_date' => Carbon::create($this->resource->document_date)->format('d-m-Y'),
        ];
    }
}
