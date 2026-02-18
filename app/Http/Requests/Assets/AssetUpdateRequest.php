<?php

namespace App\Http\Requests\Assets;

use Illuminate\Foundation\Http\FormRequest;

class AssetUpdateRequest extends FormRequest
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
            'assets_type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'fixed_asset_id' => 'required|exists:fixed_assets,id',
            'category_id'   => 'required|exists:fixed_asset_categories,id',
            'warehouse_id'  => 'required|exists:warehouses,id',
            'unit' => 'required|string|max:255',
            'status' => 'required',
            'quantity' => 'required|numeric|min:0',
        ];
    }
}
