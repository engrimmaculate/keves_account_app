<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptRequest extends FormRequest
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
            // Add your validation rules here
            'amount' => ['required', 'numeric'],
            'transaction_date' => ['required', 'date'],
            'remarks' => ['required','string','max:255'],
            'account_types' => ['required', 'integer', 'exists:accounts,id'],
        ];
    }
}
