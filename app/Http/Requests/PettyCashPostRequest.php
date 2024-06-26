<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PettyCashPostRequest extends FormRequest
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
            'account_type' =>'required',
            'transaction_date' => 'required|date',
            'expense_category_id' => 'required',
            'pettycash_id' => 'required',
            'cash_in' =>'required|string',
            'cash_out' => 'required|string',
            'transaction_date' =>'required|date',
            'particulars' => 'required|string',
            'opening_balance' =>'required|string',
            'closed_balance' => 'required|string',
            'balance' =>'required|string',
            'acct_period' => 'required|string',
            'voucher_no' => 'required|string',
        ];
    }
}
