<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BeginningBalance extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_account_id',
        'description',
        'opening_balance',
        'starts_on',
        'ends_on',
        'period_in_days',
        'calender_month',
        'fiscal_year',
        'closing_balance',
        'status',
    ];
    public function bankAccount():BelongsTo
    {
        return $this->belongsTo(BankAccount::class,'id','bank_account_id');
    }
}
