<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'birth_date'        => 'required|date',
            'salary'            => 'required|integer',
            'birth_place'       => 'sometimes|nullable|string|max:100',
            'father_name'       => 'sometimes|nullable|string|max:100',
            'mother_full_name'  => 'sometimes|nullable|string|max:100',
            'gender'            => 'required|string|in:male,female',
            'address'           => 'required|string|max:200',
            'phone_number'      => 'required|numeric',
            'qualification'     => 'sometimes|nullable|string|max:200',
            'work_start_date'   => 'required|date',
            'work_end_date'     => 'sometimes|nullable|date|after:work_start_date',
        ];
    }
}
