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
            $table->string('fio', 50)->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('email', 20)->nullable();
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
            $table->string('analysis_results')->nullable();
            $table->string('extra_info', 500)->nullable();
        });

        Schema::create('client_family_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('marital_status', 15)->nullable();
            $table->string('children', 100)->nullable();
            $table->string('children_age', 50)->nullable();
        });

        Schema::create('client_work_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('profession', 100)->nullable();
            $table->string('do_like_your_working', 10)->nullable();
            $table->string('work_character', 50)->nullable();
            $table->string('working_history', 500)->nullable();
            $table->string('hobby', 100)->nullable();
            $table->string('rest', 100)->nullable();
            $table->string('sport', 100)->nullable();
            $table->string('driving_time', 20)->nullable();
            $table->string('transport_time', 20)->nullable();
            $table->string('pc_time', 20)->nullable();
            $table->string('working_time', 20)->nullable();
            $table->string('walking_time', 20)->nullable();
        });

        Schema::create('client_bad_habits_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->boolean('smoking')->nullable()->default(0);
            $table->integer('cigarets_per_day')->nullable();
            $table->boolean('do_you_want_quit_smoking', 20)->nullable()->default(0);;
            $table->boolean('alcohol', 20)->nullable()->default(0);
            $table->string('alcohol_how_often', 50)->nullable();
            $table->string('what_alcohol', 100)->nullable();
            $table->string('another_dependencies', 200)->nullable();
        });

        Schema::create('client_food_habits_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('main_meals_amount')->nullable();
            $table->integer('meals_amount')->nullable();
            $table->string('food_limit', 100)->nullable();
            $table->string('food_intolerance', 100)->nullable();
            $table->string('food_allergy', 100)->nullable();
            $table->string('what_drink', 100)->nullable();
            $table->integer('cups_of_tea_coffee')->nullable();
            $table->string('cooking_oil', 50)->nullable();
            $table->string('sugar_source', 100)->nullable();
            $table->string('favorite_food', 100)->nullable();
            $table->string('food_cravings', 100)->nullable();
            $table->string('food_avoid', 100)->nullable();
            $table->string('diet', 200)->nullable();
        });

        Schema::create('client_dream_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('bedtime')->nullable();
            $table->string('rising_time', 20)->nullable();
            $table->string('do_you_feel_rest', 20)->nullable();
            $table->string('asleep_time', 20)->nullable();
            $table->string('doy_you_fall_asleep_easly', 50)->nullable();
            $table->string('nightly_awakening', 50)->nullable();
            $table->boolean('snores')->nullable()->default(0);
            $table->string('daily_routine', 300)->nullable();
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
            $table->string('another',  200)->nullable();

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

            $table->string('med_question_13', 50)->nullable();
            $table->string('med_question_14', 50)->nullable();
            $table->string('med_question_15', 50)->nullable();
            $table->string('med_question_16', 50)->nullable();
            $table->string('med_question_17', 50)->nullable();
            $table->string('med_question_18', 50)->nullable();
            $table->string('med_question_19', 50)->nullable();

            $table->string('med_question_20', 200)->nullable();
            $table->string('med_question_21', 200)->nullable();
            $table->string('med_question_22', 200)->nullable();

            $table->string('med_question_23', 50)->nullable();
            $table->string('med_question_24', 50)->nullable();
            $table->string('med_question_25', 50)->nullable();
            $table->string('med_question_26', 50)->nullable();
            $table->string('med_question_27', 50)->nullable();
            $table->string('med_question_28', 50)->nullable();
            $table->string('med_question_29', 50)->nullable();
            $table->string('med_question_30', 50)->nullable();
            $table->string('med_question_31', 50)->nullable();

            $table->string('med_question_32', 50)->nullable();
            $table->string('med_question_33', 50)->nullable();
            $table->string('med_question_34', 50)->nullable();

            $table->string('med_question_35', 200)->nullable();

            $table->string('med_question_36', 100)->nullable();
            $table->string('med_question_37', 100)->nullable();
            $table->string('med_question_38', 100)->nullable();
            $table->string('med_question_39', 100)->nullable();
            $table->string('med_question_40', 100)->nullable();

            $table->string('med_question_41', 100)->nullable();
            $table->string('med_question_42', 100)->nullable();

            $table->string('med_question_43', 100)->nullable();
            $table->string('med_question_44', 100)->nullable();
            $table->string('med_question_45', 100)->nullable();
            $table->string('med_question_46', 100)->nullable();
            $table->string('med_question_47', 100)->nullable();
        });

        Schema::create('client_family_history_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('mother', 100)->nullable();
            $table->string('father', 100)->nullable();
            $table->string('grandma', 100)->nullable();
            $table->string('grandpa', 100)->nullable();
            $table->string('brothers', 100)->nullable();
            $table->string('sisters', 100)->nullable();
        });

        Schema::create('client_woman_health_data', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('woman_question_1', 200)->nullable();
            $table->string('woman_question_2', 200)->nullable();
            $table->string('woman_question_3', 100)->nullable();
            $table->string('woman_question_4', 100)->nullable();
            $table->boolean('woman_question_5', 100)->nullable()->default(0);
            $table->string('woman_question_6', 100)->nullable();
            $table->string('woman_question_7', 100)->nullable();
            $table->string('woman_question_8', 50)->nullable();
            $table->string('woman_question_9', 50)->nullable();
            $table->string('woman_question_10', 50)->nullable();
            $table->string('woman_question_11', 200)->nullable();
            $table->string('woman_question_12', 100)->nullable();
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
