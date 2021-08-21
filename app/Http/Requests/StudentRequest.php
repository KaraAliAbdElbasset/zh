<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'first_name_fr'     => 'required|string|max:100',
            'last_name_fr'      => 'required|string|max:100',
            'birth_date'        => 'required|date',
            'birth_place'       => 'sometimes|nullable|string|max:100',
            'gender'            => 'required|string|in:male,female',
            'father_name'       => 'sometimes|nullable|string|max:100',
            'father_job'        => 'sometimes|nullable|string|max:100',
            'mother_full_name'  => 'sometimes|nullable|string|max:100',
            'phone_number'      => 'required|numeric',
            'academic_average_1'      => 'sometimes|nullable|numeric',
            'academic_average_2'      => 'sometimes|nullable|numeric',
            'academic_average_3'      => 'sometimes|nullable|numeric',
            'memorization_level'      => 'sometimes|nullable|numeric',
            'address'           => 'required|string|max:200',
            'enter_date'        => 'required|date',
            'leave_date'        => 'sometimes|nullable|date|after:enter_date',
            'education_level'   => 'sometimes|nullable|string|max:200',
            'behaviors'         => 'sometimes|nullable|string|max:200',
            'type'              => 'required|integer|in:'.implode(',',config('student.types')),
            'memorizing_level'  => 'required_if:type,1|string|max:200',
            'group'             => 'sometimes|nullable|exists:groups,id',
        ];
    }
}



