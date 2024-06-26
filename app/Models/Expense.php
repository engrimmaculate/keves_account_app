<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_type',
        'expense_category_id',
        'amount',
        'description',
        'narration',
        'remarks',
        'transaction_date',
    ];

   

    public function expenseCategory(){
        return $this->belongsTo('App\Models\ExpenseCategory','expense_category_id','id');
    }
    public function account(){
        return $this->belongsTo('App\Models\Account','account_type','id');
    }

}
