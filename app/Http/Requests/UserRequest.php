<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules =  [
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:8|max:24|confirmed',
        ];

        if ($this->method() === 'PUT')
        {
            $rules['password'] = 'sometimes|nullable|string|min:8|max:24|confirmed';
            $rules['email'] = 'required|email|unique:users,email,'.$this->route('user');
        }

        return $rules;
    }
}
