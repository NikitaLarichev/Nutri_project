<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientBadHabitsData;
use App\Models\ClientDreamData;
use App\Models\ClientFamilyData;
use App\Models\ClientFamilyHistoryData;
use App\Models\ClientFoodHabitsData;
use App\Models\ClientGeneralData;
use App\Models\ClientMedicineHistoryData;
use App\Models\ClientWomanHealthData;
use App\Models\ClientWorkData;
use App\Models\DailyGeneral;
use App\Models\Breakfast;
use App\Models\Dinner;
use App\Models\Supper;
use App\Models\FirstLunch;
use App\Models\SecondLunch;
use App\Models\ThirdLunch;

class AccountController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->anamnesisIsComplete == 0){
                return view('account.client_info',['user'=>$user]);
            } else {
                $todayDate = date('Y-m-d');
                $t = DailyGeneral::firstWhere('date', $todayDate);
                //dd($t);
                if($t == null){
                    $general = new DailyGeneral;
                    $general->client_id = Auth::user()->id;
                    $general->date = $todayDate;
                    $general->save();
                    $general->breakfast()->create();
                    $general->dinner()->create();
                    $general->supper()->create();
                    $general->firstLunch()->create();
                    $general->secondLunch()->create();
                    $general->thirdLunch()->create();
                }
                $nutritionJournalInfoArr = DailyGeneral::with('Breakfast', 'Dinner', 'Supper', 'FirstLunch', 'SecondLunch', 'ThirdLunch')->where('client_id', $user->id)->orderby('date', 'desc')->get();
                //dd($nutritionJournalInfoArr->Breakfast);
                return view('account.account_nj', ['nutritionJournalInfoArr' => $nutritionJournalInfoArr, 'user'=>$user]);
            }
        }
        else{
            return redirect("login");
        }
    }
    public function anamnesisComplete(Request $request){

        /*$validated = $request->validate([
            'date_of_completion'=> 'required',
            'fio'=> 'required',
            'birthday'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'reasons_for_consultation'=> 'required',
            'desired_results'=> 'required',
            'height'=> 'required',
            'weight'=> 'required',
            'weight_fluctuations'=> 'required',
            'waist_circumference'=> 'required',
            'desire_weight'=> 'required',

            'main_meals_amount' => 'required',
            'meals_amount' => 'required',
            'what_drink' => 'required',

            'bedtime' => 'required',
            'rising_time' => 'required',
            'do_you_feel_rest' => 'required',
            'asleep_time' => 'required',
            'doy_you_fall_asleep_easly' => 'required',
            'nightly_awakening' => 'required',
            'daily_routine' => 'required',
            'med_question_28' => 'required',
            'med_question_30' => 'required',
            'med_question_32' => 'required',
            'med_question_33' => 'required',
            'med_question_34' => 'required',
            'med_question_35' => 'required',
            'med_question_36' => 'required',
            'med_question_37' => 'required',
            'med_question_38' => 'required',
            'med_question_39' => 'required',
            'med_question_40' => 'required',
            'med_question_41' => 'required',
            'med_question_42' => 'required'
        ]);*/

        $general = new ClientGeneralData;
        $general->client_id = Auth::user()->id;
        $general->date_of_completion = $request->date_of_completion;
        $general->fio = $request->fio;
        $general->birthday = $request->birthday;
        $general->phone = $request->phone;
        $general->email = $request->email;
        $general->reasons_for_consultation = $request->reasons_for_consultation;
        $general->desired_results = $request->desired_results;
        $general->height = $request->height;
        $general->weight = $request->weight;
        $general->weight_fluctuations = $request->weight_fluctuations;
        $general->waist_circumference = $request->waist_circumference;
        $general->gain_weight = $request->gain_weight;
        $general->lose_weight = $request->lose_weight;
        $general->save_weight = $request->save_weight;
        $general->desire_weight = $request->desire_weight;
        $general->gain_weight = $request->gain_weight;
        $general->analysis_results = $request->analysis_results;
        $general->extra_info = $request->extra_info;
        $general->save();

        $badHabits = new ClientBadHabitsData;
        $badHabits->client_id = Auth::user()->id;
        $badHabits->smoking = $request->smoking;
        $badHabits->cigarets_per_day = $request->cigarets_per_day;
        $badHabits->do_you_want_quit_smoking = $request->do_you_want_quit_smoking;
        $badHabits->alcohol = $request->alcohol;
        $badHabits->alcohol_how_often = $request->alcohol_how_often;
        $badHabits->what_alcohol = $request->what_alcohol;
        $badHabits->another_dependencies = $request->another_dependencies;
        $badHabits->save();

        $dream = new ClientDreamData;
        $dream->client_id = Auth::user()->id;
        $dream->bedtime = $request->bedtime;
        $dream->rising_time = $request->rising_time;
        $dream->do_you_feel_rest = $request->do_you_feel_rest;
        $dream->asleep_time = $request->asleep_time;
        $dream->doy_you_fall_asleep_easly = $request->doy_you_fall_asleep_easly;
        $dream->nightly_awakening = $request->nightly_awakening;
        $dream->snores = $request->snores;
        $dream->daily_routine = $request->daily_routine;
        $dream->save();

        $foodHabits = new ClientFoodHabitsData;
        $foodHabits->client_id = Auth::user()->id;
        $foodHabits->main_meals_amount = $request->main_meals_amount;
        $foodHabits->meals_amount = $request->meals_amount;
        $foodHabits->food_limit = $request->food_limit;
        $foodHabits->food_intolerance = $request->food_intolerance;
        $foodHabits->food_allergy = $request->food_allergy;
        $foodHabits->what_drink = $request->what_drink;
        $foodHabits->cups_of_tea_coffee = $request->cups_of_tea_coffee;
        $foodHabits->cooking_oil = $request->cooking_oil;
        $foodHabits->sugar_source = $request->sugar_source;
        $foodHabits->favorite_food = $request->favorite_food;
        $foodHabits->food_cravings = $request->food_cravings;
        $foodHabits->food_avoid = $request->food_avoid;
        $foodHabits->diet = $request->diet;
        $foodHabits->save();

        $work = new ClientWorkData;
        $work->client_id = Auth::user()->id;
        $work->profession = $request->profession;
        $work->do_like_your_working	 = $request->do_like_your_working	;
        $work->work_character = $request->work_character;
        $work->working_history = $request->working_history;
        $work->hobby = $request->hobby;
        $work->rest = $request->rest;
        $work->sport = $request->sport;
        $work->driving_time = $request->driving_time;
        $work->transport_time = $request->transport_time;
        $work->pc_time = $request->pc_time;
        $work->working_time = $request->working_time;
        $work->walking_time = $request->walking_time;
        $work->save();

        $family = new ClientFamilyData;
        $family->client_id = Auth::user()->id;
        $family->marital_status = $request->marital_status;
        $family->children = $request->children;
        $family->children_age = $request->children_age;
        $family->save();


        $familyHistory = new ClientFamilyHistoryData;
        $familyHistory->client_id = Auth::user()->id;
        $familyHistory->mother = $request->mother;
        $familyHistory->father = $request->father;
        $familyHistory->grandma = $request->grandma;
        $familyHistory->grandpa	 = $request->grandpa	;
        $familyHistory->brothers = $request->brothers;
        $familyHistory->sisters = $request->sisters;
        $familyHistory->save();


        $medicineHistory = new ClientMedicineHistoryData;
        $medicineHistory->client_id = Auth::user()->id;
        $medicineHistory->massage = $request->massage;
        $medicineHistory->osteopath = $request->osteopath;
        $medicineHistory->nutrition = $request->nutrition;
        $medicineHistory->supplements = $request->supplements;
        $medicineHistory->sport = $request->sport;
        $medicineHistory->herb = $request->herb;
        $medicineHistory->drugs = $request->drugs;
        $medicineHistory->another = $request->another;
        $medicineHistory->med_question_1 = $request->med_question_1;
        $medicineHistory->med_question_2 = $request->med_question_2;
        $medicineHistory->med_question_3 = $request->med_question_3;
        $medicineHistory->med_question_4 = $request->med_question_4;
        $medicineHistory->med_question_5 = $request->med_question_5;
        $medicineHistory->med_question_6 = $request->med_question_6;
        $medicineHistory->med_question_7 = $request->med_question_7;
        $medicineHistory->med_question_8 = $request->med_question_8;
        $medicineHistory->med_question_9 = $request->med_question_9;
        $medicineHistory->med_question_10 = $request->med_question_10;
        $medicineHistory->med_question_11 = $request->med_question_11;
        $medicineHistory->med_question_12 = $request->med_question_12;
        $medicineHistory->med_question_13 = $request->med_question_13;
        $medicineHistory->med_question_14 = $request->med_question_14;
        $medicineHistory->med_question_15 = $request->med_question_15;
        $medicineHistory->med_question_16 = $request->med_question_16;
        $medicineHistory->med_question_17 = $request->med_question_17;
        $medicineHistory->med_question_18 = $request->med_question_18;
        $medicineHistory->med_question_19 = $request->med_question_19;
        $medicineHistory->med_question_20 = $request->med_question_20;
        $medicineHistory->med_question_21 = $request->med_question_21;
        $medicineHistory->med_question_22 = $request->med_question_22;
        $medicineHistory->med_question_23 = $request->med_question_23;
        $medicineHistory->med_question_24 = $request->med_question_24;
        $medicineHistory->med_question_25 = $request->med_question_25;
        $medicineHistory->med_question_26 = $request->med_question_26;
        $medicineHistory->med_question_27 = $request->med_question_27;
        $medicineHistory->med_question_28 = $request->med_question_28;
        $medicineHistory->med_question_29 = $request->med_question_29;
        $medicineHistory->med_question_30 = $request->med_question_30;
        $medicineHistory->med_question_31 = $request->med_question_31;
        $medicineHistory->med_question_32 = $request->med_question_32;
        $medicineHistory->med_question_33 = $request->med_question_33;
        $medicineHistory->med_question_34 = $request->med_question_34;
        $medicineHistory->med_question_35 = $request->med_question_35;
        $medicineHistory->med_question_36 = $request->med_question_36;
        $medicineHistory->med_question_37 = $request->med_question_37;
        $medicineHistory->med_question_38 = $request->med_question_38;
        $medicineHistory->med_question_39 = $request->med_question_39;
        $medicineHistory->med_question_40 = $request->med_question_40;
        $medicineHistory->med_question_41 = $request->med_question_41;
        $medicineHistory->med_question_42 = $request->med_question_42;
        $medicineHistory->med_question_43 = $request->med_question_43;
        $medicineHistory->med_question_44 = $request->med_question_44;
        $medicineHistory->med_question_45 = $request->med_question_45;
        $medicineHistory->med_question_46 = $request->med_question_46;
        $medicineHistory->med_question_47 = $request->med_question_47;
        $medicineHistory->save();


        $womanHealth = new ClientWomanHealthData;
        $womanHealth->client_id = Auth::user()->id;
        $womanHealth->woman_question_1 = $request->woman_question_1;
        $womanHealth->woman_question_2 = $request->woman_question_2;
        $womanHealth->woman_question_3 = $request->woman_question_3;
        $womanHealth->woman_question_4 = $request->woman_question_4;
        $womanHealth->woman_question_5 = $request->woman_question_5;
        $womanHealth->woman_question_6 = $request->woman_question_6;
        $womanHealth->woman_question_7 = $request->woman_question_7;
        $womanHealth->woman_question_8 = $request->woman_question_8;
        $womanHealth->woman_question_9 = $request->woman_question_9;
        $womanHealth->woman_question_10 = $request->woman_question_10;
        $womanHealth->woman_question_11 = $request->woman_question_11;
        $womanHealth->woman_question_12 = $request->woman_question_12;
        $womanHealth->save();

        $user = Auth::user();
        $user->anamnesisIsComplete = 1;
        $user->save();
        return redirect()->route('account_nj');
    }

    public function journalSave(Request $request){
        
        $data = DailyGeneral::firstWhere('date', $request->date);
        if($data==null){
            $dailyGeneral = new DailyGeneral;
            $dailyGeneral->date = $request->date;
            $dailyGeneral->client_id = Auth::user()->id;
            $dailyGeneral->sleepDuration = $request->sleepDuration;
            $dailyGeneral->risingTime = $request->risingTime;
            $dailyGeneral->sleepQuality = $request->sleepQuality;
            $dailyGeneral->wasRisingEasy = $request->wasRisingEasy;
            $dailyGeneral->bedtime = $request->bedtime;
            $dailyGeneral->dailyPhysicActivity = $request->dailyPhysicActivity;
            $dailyGeneral->dailyEnergyLevel = $request->dailyEnergyLevel;
            $dailyGeneral->waterVolume = $request->waterVolume;
            $dailyGeneral->conditionChanges = $request->conditionChanges;
            $dailyGeneral->hardestMoment = $request->hardestMoment;
            $dailyGeneral->dailyPersonalVictories = $request->dailyPersonalVictories;
            $dailyGeneral->save();
            
            $dailyGeneral->breakfast()->create([
                'b_dish' => $request->b_dish,
                'b_mealtime' => $request->b_mealtime,
                'b_hungerScale' => $request->b_hungerScale,
                'b_iEatBecause' => $request->b_iEatBecause,
                'b_afterEatingFeeling' => $request->b_afterEatingFeeling,
                'b_someHoursAfterEatingFeeling' => $request->b_someHoursAfterEatingFeeling,
                'b_anotherNote' => $request->b_anotherNote,
            ]);

            $dailyGeneral->dinner()->create([
                'd_dish' => $request->d_dish,
                'd_mealtime' => $request->d_mealtime,
                'd_hungerScale' => $request->d_hungerScale,
                'd_iEatBecause' => $request->d_iEatBecause,
                'd_afterEatingFeeling' => $request->d_afterEatingFeeling,
                'd_someHoursAfterEatingFeeling' => $request->d_someHoursAfterEatingFeeling,
                'd_anotherNote' => $request->d_anotherNote,
            ]);

            $dailyGeneral->supper()->create([
                's_dish' => $request->s_dish,
                's_mealtime' => $request->s_mealtime,
                's_hungerScale' => $request->s_hungerScale,
                's_iEatBecause' => $request->s_iEatBecause,
                's_afterEatingFeeling' => $request->s_afterEatingFeeling,
                's_someHoursAfterEatingFeeling' => $request->s_someHoursAfterEatingFeeling,
                's_anotherNote' => $request->s_anotherNote,
            ]);

            $dailyGeneral->supper()->create([
                's_dish' => $request->s_dish,
                's_mealtime' => $request->s_mealtime,
                's_hungerScale' => $request->s_hungerScale,
                's_iEatBecause' => $request->s_iEatBecause,
                's_afterEatingFeeling' => $request->s_afterEatingFeeling,
                's_someHoursAfterEatingFeeling' => $request->s_someHoursAfterEatingFeeling,
                's_anotherNote' => $request->s_anotherNote,
            ]);

            $dailyGeneral->firstLunch()->create([
                'fl_dish' => $request->fl_dish,
                'fl_mealtime' => $request->fl_mealtime,
                'fl_hungerScale' => $request->fl_hungerScale,
                'fl_iEatBecause' => $request->fl_iEatBecause,
                'fl_afterEatingFeeling' => $request->fl_afterEatingFeeling,
                'fl_someHoursAfterEatingFeeling' => $request->fl_someHoursAfterEatingFeeling,
                'fl_anotherNote' => $request->fl_anotherNote,
            ]);

            $dailyGeneral->secondLunch()->create([
                'sl_dish' => $request->sl_dish,
                'sl_mealtime' => $request->sl_mealtime,
                'sl_hungerScale' => $request->sl_hungerScale,
                'sl_iEatBecause' => $request->sl_iEatBecause,
                'sl_afterEatingFeeling' => $request->sl_afterEatingFeeling,
                'sl_someHoursAfterEatingFeeling' => $request->sl_someHoursAfterEatingFeeling,
                'sl_anotherNote' => $request->sl_anotherNote,
            ]);

            $dailyGeneral->thirdLunch()->create([
                'tl_dish' => $request->tl_dish,
                'tl_mealtime' => $request->tl_mealtime,
                'tl_hungerScale' => $request->tl_hungerScale,
                'tl_iEatBecause' => $request->tl_iEatBecause,
                'tl_afterEatingFeeling' => $request->tl_afterEatingFeeling,
                'tl_someHoursAfterEatingFeeling' => $request->tl_someHoursAfterEatingFeeling,
                'tl_anotherNote' => $request->tl_anotherNote,
            ]);
            
        } else {
            $data->sleepDuration = $request->sleepDuration;
            $data->risingTime = $request->risingTime;
            $data->sleepQuality = $request->sleepQuality;
            $data->wasRisingEasy = $request->wasRisingEasy;
            $data->bedtime = $request->bedtime;
            $data->dailyPhysicActivity = $request->dailyPhysicActivity;
            $data->dailyEnergyLevel = $request->dailyEnergyLevel;
            $data->waterVolume = $request->waterVolume;
            $data->conditionChanges = $request->conditionChanges;
            $data->hardestMoment = $request->hardestMoment;
            $data->dailyPersonalVictories = $request->dailyPersonalVictories;
            //dd($data);
            $data->save();
            
            $data->breakfast()->b_dish = $request->b_dish;
            $data->breakfast()->b_mealtime = $request->b_mealtime;
            $data->breakfast()->b_hungerScale = $request->b_hungerScale;
            $data->breakfast()->b_iEatBecause = $request->b_iEatBecause;
            $data->breakfast()->b_afterEatingFeeling = $request->b_afterEatingFeeling;
            $data->breakfast()->b_someHoursAfterEatingFeeling = $request->b_someHoursAfterEatingFeeling;
            $data->breakfast()->b_anotherNote = $request->b_anotherNote;
            $data->breakfast()->save();

            $data->dinner()->d_dish = $request->d_dish;
            $data->dinner()->d_mealtime = $request->d_mealtime;
            $data->dinner()->d_hungerScale = $request->d_hungerScale;
            $data->dinner()->d_iEatBecause = $request->d_iEatBecause;
            $data->dinner()->d_afterEatingFeeling = $request->d_afterEatingFeeling;
            $data->dinner()->d_someHoursAfterEatingFeeling = $request->d_someHoursAfterEatingFeeling;
            $data->dinner()->d_anotherNote = $request->d_anotherNote;
            $data->dinner()->save();

            $data->supper()->s_dish = $request->s_dish;
            $data->supper()->s_mealtime = $request->s_mealtime;
            $data->supper()->s_hungerScale = $request->s_hungerScale;
            $data->supper()->s_iEatBecause = $request->s_iEatBecause;
            $data->supper()->s_afterEatingFeeling = $request->s_afterEatingFeeling;
            $data->supper()->s_someHoursAfterEatingFeeling = $request->s_someHoursAfterEatingFeeling;
            $data->supper()->s_anotherNote = $request->s_anotherNote;
            $data->supper()->save();

            $data->firstLunch()->fl_dish = $request->fl_dish;
            $data->firstLunch()->fl_mealtime = $request->fl_mealtime;
            $data->firstLunch()->fl_hungerScale = $request->fl_hungerScale;
            $data->firstLunch()->fl_iEatBecause = $request->fl_iEatBecause;
            $data->firstLunch()->fl_afterEatingFeeling = $request->fl_afterEatingFeeling;
            $data->firstLunch()->fl_someHoursAfterEatingFeeling = $request->fl_someHoursAfterEatingFeeling;
            $data->firstLunch()->fl_anotherNote = $request->fl_anotherNote;
            $data->firstLunch()->save();

            $data->secondLunch()->sl_dish = $request->sl_dish;
            $data->secondLunch()->sl_mealtime = $request->sl_mealtime;
            $data->secondLunch()->sl_hungerScale = $request->sl_hungerScale;
            $data->secondLunch()->sl_iEatBecause = $request->sl_iEatBecause;
            $data->secondLunch()->sl_afterEatingFeeling = $request->sl_afterEatingFeeling;
            $data->secondLunch()->sl_someHoursAfterEatingFeeling = $request->sl_someHoursAfterEatingFeeling;
            $data->secondLunch()->sl_anotherNote = $request->sl_anotherNote;
            $data->secondLunch()->save();

            $data->thirdLunch()->tl_dish = $request->tl_dish;
            $data->thirdLunch()->tl_mealtime = $request->tl_mealtime;
            $data->thirdLunch()->tl_hungerScale = $request->tl_hungerScale;
            $data->thirdLunch()->tl_iEatBecause = $request->tl_iEatBecause;
            $data->thirdLunch()->tl_afterEatingFeeling = $request->tl_afterEatingFeeling;
            $data->thirdLunch()->tl_someHoursAfterEatingFeeling = $request->tl_someHoursAfterEatingFeeling;
            $data->thirdLunch()->tl_anotherNote = $request->tl_anotherNote;
            $data->thirdLunch()->save();

            return redirect('/account.account_nj');
        }
    }

}