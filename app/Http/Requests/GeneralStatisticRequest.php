<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralStatisticRequest extends FormRequest
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
            'birth_place'       => 'sometimes|nullable|string|max:100',
            'birth_date'        => 'required|date',
            'job'               => 'required|string',
            'job_address'       => 'sometimes|nullable|string',
            'father_name'       => 'required|string|max:100',
            'mother_full_name'  => 'required|string|max:100',
            'gender'            => 'required|string|in:male,female',
            'note'              => 'required|string|max:100',
            'address'           => 'required|string|max:100',
            'phone_number'      => 'required|string|max:100',
            'qualification'     => 'sometimes|nullable|string|max:200',
            'social_status'     => 'required|string|max:200',
            'national_number'   => 'sometimes|nullable|numeric',
            'serial_number'     => 'sometimes|nullable|numeric',
        ];
















    }
}
