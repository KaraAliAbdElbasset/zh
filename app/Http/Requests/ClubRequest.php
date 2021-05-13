<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubRequest extends FormRequest
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
            'name'              => 'required|string|max:200',
            'managing_office'   => 'required|string|max:200',
            'establishing_date' => 'required|date',
            'year'              => 'required|string|max:4',
            'address'           => 'required|string|max:200',
            'goals'             => 'sometimes|nullable|string|max:200',
            'funding_sources'   => 'sometimes|nullable|string|max:200'
        ];
    }
}
