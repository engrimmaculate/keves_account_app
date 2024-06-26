<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_no',
        'account_name',
        'bank_name',
        'bank_branch',
        'account_type',
        'balance'
    ];

    /**
     * Get the OpenningBalance associated with the BankAccount.
     */
    public function openningBalances():HasMany
     {
        return $this->hasMany(BankAccount::class,'id','bank_account_id');
    }
    
}
