<?php

namespace App\Http\Requests\MixRatio;

use Illuminate\Foundation\Http\FormRequest;

class MixRatioStoreRequest extends FormRequest
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
            'ratio_name' => 'required|string|max:255',
            'ratio_type' => 'required|string|max:255',
            'dry_volume_factor' => 'required|string|max:255',
        ];
    }
}
