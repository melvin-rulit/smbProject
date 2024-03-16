<?php

namespace App\Http\Requests\User;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'birthday' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'passport_series' => ['required', 'string'],
            'passport_number' => ['required', 'string'],
            'registration_address' => ['required', 'string'],
            'passport_notes' => ['required', 'string'],
            'role_id' => ['required', 'numeric'],
            'branch_id' => ['required', 'numeric'],
            'password' => ['required', 'string'],
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
            'role_id.required' => 'Роль обязательна для заполнения',
            'branch_id.required' => 'Филиал обязателен для заполнения',
        ];
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getEmail(): string
    {
        return $this->input('email');
    }

    public function getPassword(): string
    {
        return $this->input('password');
    }

    public function getRoleId(): int
    {
        return $this->input('role_id');
    }

    public function getBranchId(): int
    {
        return $this->input('branch_id');
    }

    public function isEnabled(): bool
    {
        return (bool)$this->input('enabled');
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

    public function getPhone(): string
    {
        return preg_replace('|\D|Ui', '', $this->input('phone_number'));
    }

    public function getComment(): string
    {
        return $this->input('comment') ?? '';
    }
}
