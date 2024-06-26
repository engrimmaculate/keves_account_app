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
        Schema::create('profitor_losses', function (Blueprint $table) {
            $table->id();
            $table->integer('period_in_days');
            $table->string('month_name');
            $table->string('fiscal_year');
            $table->string('kitchen_income');
            $table->string('room_income');
            $table->string('pool_bar_income');
            $table->string('laundry_income');
            $table->string('barbeque_income');
            $table->string('bush_bar_kitchen_income');
            $table->string('bush_bar_income');
            $table->string('snooker_income');
            $table->string('pastry_income');
            $table->string('club_income');
            $table->string('hall_income');
            $table->string('swimming');
            $table->string('sharwama');
            $table->string('showglass');
            $table->string('other_income');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profitor_losses');
    }
};
