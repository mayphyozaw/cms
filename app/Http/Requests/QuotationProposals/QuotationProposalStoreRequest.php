<?php

namespace App\Http\Requests\QuotationProposals;

use Illuminate\Foundation\Http\FormRequest;

class QuotationProposalStoreRequest extends FormRequest
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
            'main_subject' => 'required|string|max:255',
            'proposal_date' => 'required|date|max:255',
            'workscope_id' => 'required|integer|exists:work_scopes,id',
            'status' => 'nullable|string|max:255',
            'client_id' => 'required|integer|exists:clients,id',
            'project_id' => 'required|integer|exists:projects,id',
            'subtotal_amount' => 'nullable|numeric|min:0',
            'discount_amount' => 'nullable|numeric|min:0',
            'total_amount' => 'nullable|numeric|min:0',
            'due_amount' => 'nullable|numeric|min:0',
            'notes' => 'required|string|max:255',
            'quantity.*' => 'required|numeric|min:1',
            'unit.*' => 'required|numeric|min:0',
            'proposal_discount' => 'nullable|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',

        ];
    }
}
