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
        Schema::create('daily_general', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->date('date');
            $table->string('sleepDuration', 10)->nullable();
            $table->string('risingTime', 10)->nullable();
            $table->string('sleepQuality', 50)->nullable();
            $table->boolean('wasRisingEasy')->nullable();
            $table->string('bedtime', 10)->nullable();
            $table->string('dailyPhysicActivity', 50)->nullable();
            $table->string('dailyEnergyLevel', 50)->nullable();
            $table->string('waterVolume', 20)->nullable();
            $table->string('conditionChanges', 50)->nullable();
            $table->string('hardestMoment', 50)->nullable();
            $table->string('dailyPersonalVictories', 50)->nullable();
        });

        Schema::create('breakfasts', function (Blueprint $table) {
            $table->id();
            $table->string('b_dish', 100)->nullable();
            $table->string('b_mealtime', 20)->nullable();
            $table->integer('b_hungerScale')->nullable();
            $table->string('b_iEatBecause', 300)->nullable();
            $table->string('b_afterEatingFeeling', 300)->nullable();
            $table->string('b_someHoursAfterEatingFeeling', 300)->nullable();
            $table->string('b_anotherNote', 500)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general');
        });

        Schema::create('first_lunches', function (Blueprint $table) {
            $table->id();
            $table->string('fl_dish', 100)->nullable();
            $table->string('fl_mealtime', 20)->nullable();
            $table->integer('fl_hungerScale')->nullable();
            $table->string('fl_iEatBecause', 300)->nullable();
            $table->string('fl_afterEatingFeeling', 300)->nullable();
            $table->string('fl_someHoursAfterEatingFeeling', 300)->nullable();
            $table->string('fl_anotherNote', 500)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general')->nullable();
        });

        Schema::create('dinners', function (Blueprint $table) {
            $table->id();
            $table->string('d_dish', 100)->nullable();
            $table->string('d_mealtime', 20)->nullable();
            $table->integer('d_hungerScale')->nullable();
            $table->string('d_iEatBecause', 300)->nullable();
            $table->string('d_afterEatingFeeling', 300)->nullable();
            $table->string('d_someHoursAfterEatingFeeling', 300)->nullable();
            $table->string('d_anotherNote', 500)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general')->nullable();
        });

        Schema::create('second_lunches', function (Blueprint $table) {
            $table->id();
            $table->string('sl_dish', 100)->nullable();
            $table->string('sl_mealtime', 20)->nullable();
            $table->integer('sl_hungerScale')->nullable();
            $table->string('sl_iEatBecause', 300)->nullable();
            $table->string('sl_afterEatingFeeling', 300)->nullable();
            $table->string('sl_someHoursAfterEatingFeeling', 300)->nullable();
            $table->string('sl_anotherNote', 500)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general')->nullable();
        });

        Schema::create('suppers', function (Blueprint $table) {
            $table->id();
            $table->string('s_dish', 100)->nullable();
            $table->string('s_mealtime', 20)->nullable();
            $table->integer('s_hungerScale')->nullable();
            $table->string('s_iEatBecause', 300)->nullable();
            $table->string('s_afterEatingFeeling', 300)->nullable();
            $table->string('s_someHoursAfterEatingFeeling', 300)->nullable();
            $table->string('s_anotherNote', 500)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general')->nullable();
        });

        Schema::create('third_lunches', function (Blueprint $table) {
            $table->id();
            $table->string('tl_dish', 100)->nullable();
            $table->string('tl_mealtime', 20)->nullable();
            $table->integer('tl_hungerScale')->nullable();
            $table->string('tl_iEatBecause', 300)->nullable();
            $table->string('tl_afterEatingFeeling', 300)->nullable();
            $table->string('tl_someHoursAfterEatingFeeling', 300)->nullable();
            $table->string('tl_anotherNote', 500)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general')->nullable();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
