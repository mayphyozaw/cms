<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $this->route('client'),
            'address' => 'nullable|string|max:255',
            'client_type' => 'nullable|string|max:255',
            'client_code' => 'nullable|string|max:255',
            'project_code' => 'nullable|string|max:255',
            'site_location' => 'nullable|string|max:255',
            'building_area' => 'nullable|string|max:255',
            'storeys' => 'nullable|string|max:255',
            'construction_type' => 'nullable|string|max:255',
            'job_scope' => 'nullable|string|max:255',
            'job_package' => 'nullable|string|max:255',
        ];
    }
}
