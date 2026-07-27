<?php

namespace App\Http\Requests\BQ;

use Illuminate\Foundation\Http\FormRequest;

class BQDetailStoreRequest extends FormRequest
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
            'boq_id' => 'required|exists:boqs,id',
            'drawing_measurement_id' => 'required|exists:drawing_measurements,id',
            'measurement_category_id' => 'required|exists:measurement_categories,id',
            'work_scope_id' => 'required|exists:work_scopes,id',
            'boq_work_category_id' => 'required|exists:boq_work_categories,id',
            'work_type' => 'required|string|max:255',
           'item_name' => 'required|string|max:255',
           'unit' => 'required|string|max:255',
           'quantity' => 'required|string|max:255',
           'remark' => 'required|string|max:255',
        ];

    }
}
