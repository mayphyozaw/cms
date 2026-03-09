<?php

namespace App\Http\Requests\EngineerRequest;

use Illuminate\Foundation\Http\FormRequest;

class FixedAssetRequestStoreRequest extends FormRequest
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
            'request_code' => 'required',
            'request_date' => 'required',
            'project_id' => 'required|integer|exists:projects,id',
            'workscope_id' => 'required|integer|exists:work_scopes,id',
            'warehouse_id' => 'required|integer|exists:warehouses,id',
            'user_id' => 'required|integer|exists:users,id',
            'asset_id' => 'required|integer|exists:assets,id',
            'status' => 'required',
            'remark' => 'required',
        ];
    }
}
