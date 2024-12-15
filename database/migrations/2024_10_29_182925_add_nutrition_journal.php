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
            $table->string('sleepDuration')->nullable();
            $table->string('risingTime')->nullable();
            $table->string('sleepQuality')->nullable();
            $table->string('wasRisingEasy')->nullable();
            $table->string('bedtime')->nullable();
            $table->string('dailyPhysicActivity')->nullable();
            $table->string('dailyEnergyLevel')->nullable();
            $table->string('waterVolume')->nullable();
            $table->string('conditionChanges')->nullable();
            $table->string('hardestMoment')->nullable();
            $table->string('dailyPersonalVictories')->nullable();
        });

        Schema::create('breakfasts', function (Blueprint $table) {
            $table->id();
            $table->string('b_dish')->nullable();
            $table->string('b_mealtime')->nullable();
            $table->integer('b_hungerScale')->nullable();
            $table->string('b_iEatBecause', 500)->nullable();
            $table->string('b_afterEatingFeeling', 500)->nullable();
            $table->string('b_someHoursAfterEatingFeeling', 500)->nullable();
            $table->string('b_anotherNote', 1000)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general');
        });

        Schema::create('first_lunches', function (Blueprint $table) {
            $table->id();
            $table->string('fl_dish')->nullable();
            $table->string('fl_mealtime')->nullable();
            $table->integer('fl_hungerScale')->nullable();
            $table->string('fl_iEatBecause')->nullable();
            $table->string('fl_afterEatingFeeling')->nullable();
            $table->string('fl_someHoursAfterEatingFeeling')->nullable();
            $table->string('fl_anotherNote', 1000)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general')->nullable();
        });

        Schema::create('dinners', function (Blueprint $table) {
            $table->id();
            $table->string('d_dish')->nullable();
            $table->string('d_mealtime')->nullable();
            $table->integer('d_hungerScale')->nullable();
            $table->string('d_iEatBecause', 500)->nullable();
            $table->string('d_afterEatingFeeling', 500)->nullable();
            $table->string('d_someHoursAfterEatingFeeling', 500)->nullable();
            $table->string('d_anotherNote', 1000)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general')->nullable();
        });

        Schema::create('second_lunches', function (Blueprint $table) {
            $table->id();
            $table->string('sl_dish')->nullable();
            $table->string('sl_mealtime')->nullable();
            $table->integer('sl_hungerScale')->nullable();
            $table->string('sl_iEatBecause', 500)->nullable();
            $table->string('sl_afterEatingFeeling', 500)->nullable();
            $table->string('sl_someHoursAfterEatingFeeling', 500)->nullable();
            $table->string('sl_anotherNote', 1000)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general')->nullable();
        });

        Schema::create('suppers', function (Blueprint $table) {
            $table->id();
            $table->string('s_dish')->nullable();
            $table->string('s_mealtime')->nullable();
            $table->integer('s_hungerScale')->nullable();
            $table->string('s_iEatBecause', 500)->nullable();
            $table->string('s_afterEatingFeeling', 500)->nullable();
            $table->string('s_someHoursAfterEatingFeeling', 500)->nullable();
            $table->string('s_anotherNote', 1000)->nullable();
            $table->unsignedBigInteger('daily_general_id')->nullable();
            $table->foreign('daily_general_id')->references('id')->on('daily_general')->nullable();
        });

        Schema::create('third_lunches', function (Blueprint $table) {
            $table->id();
            $table->string('tl_dish')->nullable();
            $table->string('tl_mealtime')->nullable();
            $table->integer('tl_hungerScale')->nullable();
            $table->string('tl_iEatBecause', 500)->nullable();
            $table->string('tl_afterEatingFeeling', 500)->nullable();
            $table->string('tl_someHoursAfterEatingFeeling', 500)->nullable();
            $table->string('tl_anotherNote', 1000)->nullable();
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
