<?php

namespace App\Http\Requests\Proxi;

use Illuminate\Foundation\Http\FormRequest;

class CreateProxiRequest extends FormRequest
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
            'delegate_id'   => ['required'],
            'owner_id'      => ['required'],
            'number'        => ['required'],
            'valid_until'   => ['required'],
            'issued_by'     => ['required'],
            'issued_number' => ['required'],
        ];
    }
public function messages(): array
{
    return [
        'delegate_id.required' => 'Вы не выбрали представителя',
        'owner_id.required' => 'Вы не выбрали собственника',
        'number.required' => 'Поле "номер" обязательно нужно заполнить',
        'valid_until.required' => 'Заполните дату доверенности',
        'issued_by.required' => 'Укажите кем выдан',
        'issued_number.required' => 'Заполните поле "Запись в реестре',
    ];
}

    public function getDelegateId(): int
    {
        return $this->input('delegate_id');
    }

    public function getOwnerId(): int
    {
        return $this->input('owner_id');
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
