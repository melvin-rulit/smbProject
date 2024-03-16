<?php

namespace App\Http\Requests\Client;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'first_name' => [''],
            'middle_name' => [''],
            'last_name' => [''],
            'birthday' => [''],
            'phone_number' => [''],
            'email' => ['email'],
            'passport_series' => [''],
            'passport_number' => [''],
            'registration_address' => [''],
            'residence_address' => [''],
            'resident_card' => [''],
            'personnel_number' => [''],
            'passport_notes' => [''],
            'password' => [''],
            'comment' => ''
        ];
    }

    public function getFirstName(): string
    {
        return $this->input('first_name');
    }

    public function getMiddleName(): string
    {
        return $this->input('middle_name') ?? '';
    }

    public function getLastName(): string
    {
        return $this->input('last_name');
    }

    public function getBirthday(): Carbon
    {
        return Carbon::parse($this->input('birthday'));
    }

    public function getPassportSeries(): string
    {
        return $this->input('passport_series');
    }

    public function getPassportNumber(): string
    {
        return $this->input('passport_number');
    }

    public function getPassportNotes(): string
    {
        return $this->input('passport_notes');
    }

    public function getRegistrationAddress(): string
    {
        return $this->input('registration_address');
    }

    public function getResidenceAddress(): string
    {
        return $this->input('residence_address');
    }

    public function getResidentCard(): string
    {
        return $this->input('resident_card') ?? '';
    }

    public function getPersonnelNumber(): string
    {
        return $this->input('personnel_number') ?? '';
    }

    public function getPhone(): string
    {
        return preg_replace('|\D|Ui', '', $this->input('phone_number'));
    }

    public function getEmail(): string
    {
        return $this->input('email');
    }

    public function getComment(): string
    {
        return $this->input('comment') ?? '';
    }
}
