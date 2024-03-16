<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'full_name' => $this->resource->getFullName(),
            'first_name' => $this->resource->first_name,
            'middle_name' => $this->resource->middle_name,
            'last_name' => $this->resource->last_name,
            'birthday' => Carbon::create($this->resource->birthday)->format('d-m-Y'),
            'email' => $this->resource->email,
            'passport_series' => $this->resource->passport_series,
            'passport_number' => $this->resource->passport_number,
            'passport_notes' => $this->resource->passport_notes,
            'registration_address' => $this->resource->registration_address,
            'residence_address' => $this->resource->residence_address,
            'resident_card' => $this->resource->resident_card,
            'personnel_number' => $this->resource->personnel_number,
            'phone_number' => $this->resource->phone_number,
            'comment' => $this->resource->comment,
            'branch' => $this->resource->branch,
        ];
    }
}
