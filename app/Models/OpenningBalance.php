<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpenningBalance extends Model
{
    use HasFactory;
    protected $table = 'openning_balances';

    protected $fillable =[
        'bank_account_id',
        'description',
        'opening_balance',
        'closing_balance',
        'starts_on',
        'ends_on',
        'period_in_days',
        'calender_month',
        'fiscal_year',
        'status',
    ];

    /**
     * Get the BankAccount Associated with the OpenningBalance.
     */

    // public function bankAccount():BelongsTo
    // {
    //     return $this->belongsTo(BankAccount::class);
    // }
}
