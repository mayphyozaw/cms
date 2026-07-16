<?php

namespace App\Http\Requests\LaborRate;

use Illuminate\Foundation\Http\FormRequest;

class LaborRateStoreRequest extends FormRequest
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
            'labor_type_id' => 'required|exists:labor_types,id',
            'rate' => 'required|numeric|min:0',
            'effective_date' => 'required|date',
            'status' => 'nullable',
            'remark' => 'nullable|string',
        ];
    }
}
