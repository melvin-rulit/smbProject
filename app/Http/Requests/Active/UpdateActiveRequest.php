<?php

namespace App\Http\Requests\Active;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateActiveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'body_number' => ['required'],
            'reg_number' => ['required'],
            'year' => ['required'],
            'color_id' => ['required'],
            'cost' => ['required'],
            'cost_of_rent' => ['required'],
            'cost_of_buyout' => ['required'],
            'branch_id' => ['required'],
            'investor_id' => ['required'],
            'osago' => ['required'],
            'osago_number' => ['required'],
            'document_series' => ['required'],
            'document_number' => ['required'],
            'document_notes' => ['required'],
            'document_date' => ['required'],
        ];
    }

    public function getModel(): string
    {
        return $this->input('name');
    }

    public function getBodyNumber(): string
    {
        return $this->input('body_number');
    }

    public function getRegNumber(): string
    {
        return $this->input('reg_number');
    }

    public function getYear(): int
    {
        return $this->input('year');
    }

    public function getColorId(): int
    {
        return $this->input('color_id');
    }

    public function getCost(): float
    {
        return $this->input('cost');
    }

    public function getCostOfRent(): float
    {
        return $this->input('cost_of_rent');
    }

    public function getCostOfBuyout(): float
    {
        return $this->input('cost_of_buyout');
    }

    public function getInvestorId(): int
    {
        return $this->input('investor_id');
    }

    public function getBranchId(): int
    {
        if (auth()->user()->isAdmin()) {
            return $this->input('branch_id');
        }

        return auth()->user()->getBranchId();
    }

    public function getOsago(): string
    {
        return $this->input('osago');
    }

    public function getOsagoNumber(): string
    {
        return $this->input('osago_number');
    }

    public function getDocumentSeries(): string
    {
        return $this->input('document_series');
    }

    public function getDocumentNumber(): string
    {
        return $this->input('document_number');
    }

    public function getDocumentDate(): string
    {
        return Carbon::parse($this->input('document_date'));
    }

    public function getDocumentNotes(): string
    {
        return $this->input('document_notes');
    }
}
