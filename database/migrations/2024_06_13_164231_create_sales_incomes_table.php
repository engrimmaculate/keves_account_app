<?php

use Carbon\Month;
use Faker\Core\Number;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Number as SupportNumber;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_incomes', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_id', 5)->unique();
            $table->string('income_stream');
            $table->string('amount');
            $table->string('payment_method')->default('cash');
            $table->date('transaction_date')->format('Y-m-d');
            $table->string('transaction_type')->default('credit');
            $table->integer('period_in_days')->default(30);
            $table->string('month_name')->default('date');
            $table->string('fiscal_year')->default('date');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_incomes');
    }
};
