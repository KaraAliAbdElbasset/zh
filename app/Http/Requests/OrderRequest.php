<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'sewing_client_id' => 'required|integer|exists:sewing_clients,id',
            'paid'             => 'sometimes|nullable|integer|gte:0',
            'due_date'         => 'required|date',
            'note'             => 'sometimes|nullable|string',
            'products'         => 'required|array',
            'products.*.name'  => 'required|string|max:200',
            'products.*.price' => 'required|integer|gte:0',
            'products.*.total' => 'required|integer|gte:0',
            'products.*.qty'   => 'required|integer|gte:0',
        ];
    }
}
