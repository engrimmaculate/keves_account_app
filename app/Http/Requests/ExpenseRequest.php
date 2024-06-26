<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            //
            'account_type' =>'required|not_in:0',
            'amount' => 'required|numeric|min:1',
            'transaction_date' => 'required|date',
            'expense_category_id' => 'required|not_in:0',
            'description' => 'required|string|max:255',
            'remarks' => 'required|string|max:255',
        ];
    }
}
