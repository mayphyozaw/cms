<?php

namespace App\Http\Requests\MaterialRate;

use Illuminate\Foundation\Http\FormRequest;

class RateStoreRequest extends FormRequest
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
            'variable_asset_id' => 'required|exists:variable_assets,id',
            'rate' => 'required|numeric|min:0',
            'effective_date' => 'required|date',
            'status' => 'nullable',
            'remark' => 'nullable|string',
        ];
    }
}
