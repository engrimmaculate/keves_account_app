<?php 

/**

 * Write code on Method

 *

 * @return response()

 */

use Illuminate\Support\Facades\DB;

if (! function_exists('getIncomeCategory')) {

    function getIncomeCategory ($id){
        $category = DB::query("SELECT category FROM income_categories WHERE id = '$id'");
        return $category;
     }

}


if (! function_exists('getExpenseCategory')) {

    function getExpenseCategory ($id){
        $category = DB::query("SELECT category FROM expenses WHERE id = '$id'");
        
        return $category;
     }

}