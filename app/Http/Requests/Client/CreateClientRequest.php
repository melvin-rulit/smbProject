<?php

namespace App\Http\Requests\Client;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'birthday' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'email' => ['required', 'email'],
            'passport_series' => ['required', 'string'],
            'passport_number' => ['required', 'string'],
            'registration_address' => ['required', 'string'],
            'residence_address' => ['required', 'string'],
            'resident_card' => ['required', 'string'],
            'personnel_number' => ['required', 'string'],
            'passport_notes' => ['required', 'string'],
            'comment' => ''
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Фамилия обязательна для заполнения',
            'email.required' => 'Почта обязательна для заполнения',
            'email.email' => 'Почта некорректного формата',
            'email.unique' => 'Почта должна быть уникальна',
            'password.required' => 'Пароль обязателен для заполнения',
            'middle_name.required' => 'Имя обязательно для заполнения',
            'last_name.required' => 'Отчество обязательно для заполнения',
            'birthday.required' => 'День рождение обязательно для заполнения',
            'passport_series.required' => 'Серия паспорта обязательно для заполнения',
            'passport_number.required' => 'Номер паспорта обязателен для заполнения',
            'passport_notes.required' => 'Поле "Кем выдан" обязательно для заполнения',
            'registration_address.required' => 'Адрес регистрации обязательно для заполнения',
            'phone_number.required' => 'Номер телефона обязателен для заполнения',

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
