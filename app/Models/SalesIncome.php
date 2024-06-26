<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SalesIncome extends Model
{
    use HasFactory;
    protected $fillable = [
         'voucher_id',
         'income_stream', 
         'amount',
         'payment_method',
         'transaction_date',
         'transaction_type',
         'period_in_days',
         'month_name',
         'fiscal_year',
         'remarks',
        ];

        public function incomeCategory(){
            return $this->belongsTo('App\Models\IncomeCategory','id','income_stream');
        }

        public static function getIncomeCategory ($id){
            $category = DB::query("SELECT * FROM income_categories WHERE id = '$id'");
    
            return $category;
         }
}
