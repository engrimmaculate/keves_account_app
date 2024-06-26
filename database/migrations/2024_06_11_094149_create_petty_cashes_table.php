<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('petty_cashes', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no')->nullable();
            $table->date('transaction_date'); 
            $table->string('particulars')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('cash_in')->nullable();
            $table->unsignedBigInteger('cash_out')->nullable();
            $table->unsignedBigInteger('balance');
            $table->string('opening_balance')->nullable();
            $table->string('closing_balance')->nullable();
            $table->string('acct_period')->nullable();
            $table->unsignedBigInteger('balance'); 
            $table->string('period_in_days');
            $table->string('month_name');
            $table->string('fiscal_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petty_cashes');
    }
};
