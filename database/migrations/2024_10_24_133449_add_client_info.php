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
        Schema::create('client_general_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->date('date_of_completion')->nullable();
            $table->string('fio')->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('reasons_for_consultation', 500)->nullable();
            $table->string('desired_results', 500)->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('weight_fluctuations')->nullable();
            $table->integer('waist_circumference')->nullable();
            $table->boolean('gain_weight')->nullable()->default(0);
            $table->boolean('lose_weight')->nullable()->default(0);
            $table->boolean('save_weight')->nullable()->default(0);
            $table->integer('desire_weight')->nullable();
            $table->string('extra_info', 1000)->nullable();
        });

        Schema::create('client_family_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('marital_status')->nullable();
            $table->string('children')->nullable();
            $table->string('children_age')->nullable();
        });

        Schema::create('client_work_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('profession')->nullable();
            $table->string('do_like_your_working')->nullable();
            $table->string('work_character')->nullable();
            $table->string('working_history', 500)->nullable();
            $table->string('hobby')->nullable();
            $table->string('rest')->nullable();
            $table->string('sport')->nullable();
            $table->string('driving_time')->nullable();
            $table->string('transport_time')->nullable();
            $table->string('pc_time')->nullable();
            $table->string('working_time')->nullable();
            $table->string('walking_time')->nullable();
        });

        Schema::create('client_bad_habits_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->boolean('smoking')->nullable()->default(0);
            $table->integer('cigarets_per_day')->nullable();
            $table->boolean('do_you_want_quit_smoking')->nullable()->default(0);;
            $table->boolean('alcohol')->nullable()->default(0);
            $table->string('alcohol_how_often')->nullable();
            $table->string('what_alcohol')->nullable();
            $table->string('another_dependencies')->nullable();
        });

        Schema::create('client_food_habits_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('main_meals_amount')->nullable();
            $table->integer('meals_amount')->nullable();
            $table->string('food_limit')->nullable();
            $table->string('food_intolerance')->nullable();
            $table->string('food_allergy')->nullable();
            $table->string('what_drink')->nullable();
            $table->integer('cups_of_tea_coffee')->nullable();
            $table->string('cooking_oil')->nullable();
            $table->string('sugar_source')->nullable();
            $table->string('favorite_food')->nullable();
            $table->string('food_cravings')->nullable();
            $table->string('food_avoid')->nullable();
            $table->string('diet')->nullable();
        });

        Schema::create('client_dream_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('bedtime')->nullable();
            $table->string('rising_time')->nullable();
            $table->string('do_you_feel_rest')->nullable();
            $table->string('asleep_time')->nullable();
            $table->string('doy_you_fall_asleep_easly')->nullable();
            $table->string('nightly_awakening')->nullable();
            $table->boolean('snores')->nullable()->default(0);
            $table->string('daily_routine', 500)->nullable();
        });

        Schema::create('client_medicine_history_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->boolean('massage')->nullable()->default(0);
            $table->boolean('osteopath')->nullable()->default(0);
            $table->boolean('nutrition')->nullable()->default(0);
            $table->boolean('supplements')->nullable()->default(0);
            $table->boolean('sport')->nullable()->default(0);
            $table->boolean('herb')->nullable()->default(0);
            $table->boolean('drugs')->nullable()->default(0);
            $table->string('another')->nullable();

            $table->string('med_question_1', 500)->nullable();
            $table->string('med_question_2', 300)->nullable();
            $table->boolean('med_question_3')->nullable()->default(0);
            $table->boolean('med_question_4')->nullable()->default(0);
            $table->boolean('med_question_5')->nullable()->default(0);
            $table->boolean('med_question_6')->nullable()->default(0);
            $table->boolean('med_question_7')->nullable()->default(0);
            $table->string('med_question_8', 500)->nullable();

            $table->string('med_question_9', 500)->nullable();
            $table->string('med_question_10', 500)->nullable();
            $table->string('med_question_11', 500)->nullable();
            $table->string('med_question_12', 500)->nullable();

            $table->string('med_question_13')->nullable();
            $table->string('med_question_14')->nullable();
            $table->string('med_question_15')->nullable();
            $table->string('med_question_16')->nullable();
            $table->string('med_question_17')->nullable();
            $table->string('med_question_18')->nullable();
            $table->string('med_question_19')->nullable();

            $table->string('med_question_20')->nullable();
            $table->string('med_question_21')->nullable();
            $table->string('med_question_22')->nullable();

            $table->string('med_question_23')->nullable();
            $table->string('med_question_24')->nullable();
            $table->string('med_question_25')->nullable();
            $table->string('med_question_26')->nullable();
            $table->string('med_question_27')->nullable();
            $table->string('med_question_28')->nullable();
            $table->string('med_question_29')->nullable();
            $table->string('med_question_30')->nullable();
            $table->string('med_question_31')->nullable();

            $table->string('med_question_32')->nullable();
            $table->string('med_question_33')->nullable();
            $table->string('med_question_34')->nullable();

            $table->string('med_question_35')->nullable();

            $table->string('med_question_36')->nullable();
            $table->string('med_question_37')->nullable();
            $table->string('med_question_38')->nullable();
            $table->string('med_question_39')->nullable();
            $table->string('med_question_40')->nullable();

            $table->string('med_question_41')->nullable();
            $table->string('med_question_42')->nullable();

            $table->string('med_question_43')->nullable();
            $table->string('med_question_44')->nullable();
            $table->string('med_question_45')->nullable();
            $table->string('med_question_46')->nullable();
            $table->string('med_question_47')->nullable();
        });

        Schema::create('client_family_history_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('mother')->nullable();
            $table->string('father')->nullable();
            $table->string('grandma')->nullable();
            $table->string('grandpa')->nullable();
            $table->string('brothers')->nullable();
            $table->string('sisters')->nullable();
        });

        Schema::create('client_woman_health_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('woman_question_1')->nullable();
            $table->string('woman_question_2')->nullable();
            $table->string('woman_question_3')->nullable();
            $table->string('woman_question_4')->nullable();
            $table->boolean('woman_question_5')->nullable()->default(0);
            $table->string('woman_question_6')->nullable();
            $table->string('woman_question_7')->nullable();
            $table->string('woman_question_8')->nullable();
            $table->string('woman_question_9')->nullable();
            $table->string('woman_question_10')->nullable();
            $table->string('woman_question_11')->nullable();
            $table->string('woman_question_12')->nullable();
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
