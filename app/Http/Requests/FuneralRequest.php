<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuneralRequest extends FormRequest
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
        return [
            'first_name'        => 'required|string|max:100',
            'last_name'         => 'required|string|max:100',
            'birth_place'       => 'required|string|max:100',
            'birth_date'        => 'required|date',
            'death_place'       => 'required|string',
            'death_date'        => 'required|date',
            'father_name'       => 'required|string|max:100',
            'mother_full_name'  => 'required|string|max:100',
            'gender'            => 'required|string|in:male,female',
            'expenses'          => 'required|integer',
            'meals_number'      => 'required|integer',
            'contributors'      => 'required|array',
            'moderators'        => 'required|array',
            'note'              => 'required|string|max:100',
        ];
    }
}
