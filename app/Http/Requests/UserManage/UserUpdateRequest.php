<?php

namespace App\Http\Requests\UserManage;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,' . $this->route('usermanage'),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nrcfrontphoto' => 'nullable|image|max:2048',
            'nrcbackphoto' => 'nullable|image|max:2048',
            'householdphoto' => 'nullable|image|max:2048',
            'referenceletter' => 'nullable|image|max:2048',
            'esingphoto' => 'nullable|image|max:2048',
        ];
    }
}
