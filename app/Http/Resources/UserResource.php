<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'birthday' => $this->resource->birthday,
            'email' => $this->resource->email,
            'passport_series' => $this->resource->passport_series,
            'passport_number' => $this->resource->passport_number,
            'passport_notes' => $this->resource->passport_notes,
            'registration_address' => $this->resource->registration_address,
            'phone_number' => $this->resource->phone_number,
            'comment' => $this->resource->comment,
            'role' => $this->resource->getRoleName($this->resource->role_id),
            'branch' => BranchResource::make($this->resource->branch),
            'enabled' => $this->resource->enabled,
        ];
    }
}
