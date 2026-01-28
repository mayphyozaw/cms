<?php

namespace App\Http\Requests\VariableAssets;

use Illuminate\Foundation\Http\FormRequest;

class VariableAssetStoreRequest extends FormRequest
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
            'material_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'variable_category_id' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'reorder_level' => 'required',
            'total_qty' => 'required|numeric|min:0',
        ];
    }
}
