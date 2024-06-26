<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PettyCash extends Model
{
    use HasFactory;
    protected $fillable =[
        'transaction_date',
        'particulars',
        'description',
        'cash_in',
        'cash_out',
        'opening_balance',
        'closed_balance',
        'closing_balance',
        'balance',
        'acct_period',
        'voucher_no',
    ];

     /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected function casts(): array
    // {
    //     return [
    //         'transaction_date' => 'datetime',
    //     ];
    // }
}
