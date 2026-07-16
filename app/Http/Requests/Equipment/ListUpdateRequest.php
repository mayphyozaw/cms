<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class ListUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'boq_category_id'   => 'required|exists:boq_categories,id',
            'equipment_category_id'   => 'required|exists:equipment_categories,id',
            'name' => 'required|string|max:255',
            'brand' => 'nullable',
            'model' => 'nullable',
            'serial_no' => 'nullable',
            'capacity_spec' => 'nullable',
            'rate_unit' => 'required|string',
            'ownership_type' => 'required|string',
            'purchase_date' => 'required|date',
            'status' => 'nullable',
            'remarks' => 'nullable',

        ];
    }


}
