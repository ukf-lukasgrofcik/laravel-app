<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'number' => 'required|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
            'price' => 'required|numeric|between:0,999999.99',
            'vat' => 'nullable|numeric|between:0,999999.99',
            'price_vat' => 'nullable|numeric|between:0,999999.99',

            'items' => 'required|array',
            'items.*.name' => 'required|string|max:255',
            'items.*.price' => 'required|numeric|between:0,999999.99',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.full_price' => 'required|numeric|between:0,999999.99',
        ];
    }
}
