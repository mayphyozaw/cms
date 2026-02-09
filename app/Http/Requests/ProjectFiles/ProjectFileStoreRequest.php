<?php

namespace App\Http\Requests\ProjectFiles;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFileStoreRequest extends FormRequest
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
            'project_id' => 'required|integer|exists:projects,id',
            'project_category_id' => 'required|integer|exists:project_categories,id',
            'files*' => 'required|file|max:2048',
            'remark' => 'nullable|string|max:255',
        ];
    }
}
