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
        Schema::create('beginning_balances', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_account_id');
            // $table->foreign('bank_account_id')->references('bank_accounts')->on('id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('description');
            $table->string('opening_balance');
            $table->string('starts_on');
            $table->string('ends_on');
            $table->string('period_in_days');
            $table->string('calender_month');
            $table->string('fiscal_year');
            $table->string('closing_balance')->nullable();
            $table->string('status')->default('closed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beginning_balances', function (Blueprint $table) {
        Schema::dropIfExists('beginning_balances');
        $table->dropIndex(['bank_account_id']);
    });
}
};
