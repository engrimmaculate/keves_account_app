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
        Schema::table('users', function (Blueprint $table) {
            //add user type to table
            $table->enum('user_type', ['admin', 'user', 'accountant','auditor'])->default('user')->after('password');
            //add user status to table
            $table->enum('user_status', ['active', 'inactive'])->default('active')->after('user_type');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //drop the old migrations
            $table->dropColumn('user_type');
            $table->dropColumn('user_status');
        });
    }
};
