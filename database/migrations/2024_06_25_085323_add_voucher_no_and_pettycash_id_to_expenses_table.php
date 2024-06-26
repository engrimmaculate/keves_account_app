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
        Schema::table('expenses', function (Blueprint $table) {
            //add voucher_no to the expenses table
            $table->string('voucher_no')->after('remarks')->nullable();
            //add pettycash_id to the expenses table
            $table->string('pettycash_id')->after('voucher_no')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            // drop the migrations if they exist
            $table->dropColumn('voucher_no');
            $table->dropColumn('pettycash_id');
        });
    }
};
