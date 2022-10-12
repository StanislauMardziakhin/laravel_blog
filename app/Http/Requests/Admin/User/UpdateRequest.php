<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'name.string' => 'Поле должно иметь строковый тип',
            'email.required' => 'Поле обязательно для заполнения',
            'email.string' => 'Поле должно иметь строковый тип',
            'email.email' => 'E-mail должен соответствовать формату example@some.domain',
            'email.unique' => 'Пользователь с указанным почтовым адресом уже существует',
        ];
    }

}
