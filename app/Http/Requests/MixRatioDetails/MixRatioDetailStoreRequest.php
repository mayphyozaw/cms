<?php

namespace App\Http\Requests\MixRatioDetails;

use Illuminate\Foundation\Http\FormRequest;

class MixRatioDetailStoreRequest extends FormRequest
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
            'mix_ratio_template_id'   => 'required|exists:mix_ratio_templates,id',
            'variable_asset_id'   => 'required|exists:variable_assets,id',
        ];
    }
}
