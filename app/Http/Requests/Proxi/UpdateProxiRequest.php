<?php

namespace App\Http\Requests\Proxi;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProxiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'delegate'   => ['required'],
            'owner'      => ['required'],
            'number'        => ['required'],
            'valid_until'   => ['required'],
            'issued_by'     => ['required'],
            'issued_number' => ['required'],
        ];
    }

    public function getDelegateId(): int
    {
        return $this->input('delegate.id');
    }

    public function getOwnerId(): int
    {
        return $this->input('owner.id');
    }

    public function getNumber(): string
    {
        return $this->input('number');
    }

    public function getValidUntil(): Carbon
    {
        return Carbon::parse($this->input('valid_until'));
    }

    public function getIssuedBy(): string
    {
        return $this->input('issued_by');
    }

    public function getIssuedNumber(): string
    {
        return $this->input('issued_number');
    }
}


