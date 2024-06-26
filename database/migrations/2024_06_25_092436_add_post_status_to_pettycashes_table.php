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
        Schema::table('petty_cashes', function (Blueprint $table) {
            // add  post status to table table
            $table->enum('post_status', ['posted', 'unposted'])->default('unposted')->after('cash_out');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pettycashes', function (Blueprint $table) {
            // drop the old migration if it exists
            $table->dropColumn('post_status');
        });
    }
};
