<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
use App\Models\Recommendation;
use App\Models\Material;
use App\Models\Analysis;
use App\Models\ClientProduct;

class AccountController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->anamnesisIsComplete == 1)
            {
                $week = ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'];          
                if($user->status == 'user'){
                    return view('account.client_info',['user'=>$user]);
                }
                else if($user->status == 'client'){
                    if($user->anamnesisIsComplete == 0){
                        return view('account.client_info',['user'=>$user]);
                    } else {
                        $c_prod = ClientProduct::where('client_id', $user->id)->where('end_date', null)->first();
                        $start_day = $c_prod->start_date;
                        $last_day = $start_day;
                        while (true){
                            $next_day = DailyGeneral::firstWhere('date', $last_day);
                            if($next_day == null){
                                $general = new DailyGeneral;
                                $general->client_id = Auth::user()->id;
                                $general->date = $last_day;
                                $general->save();
                                $general->breakfast()->create();
                                $general->dinner()->create();
                                $general->supper()->create();
                                $general->firstLunch()->create();
                                $general->secondLunch()->create();
                                $general->thirdLunch()->create();
                            }
                            if($last_day == date('Y-m-d')){
                                break;
                            }
                            $last_day = date("Y-m-d", strtotime("+1 days", strtotime($last_day)));
                        }
                        $nutritionJournalInfoArr = DailyGeneral::with('Breakfast', 'Dinner', 'Supper', 'FirstLunch', 'SecondLunch', 'ThirdLunch')->where('client_id', $user->id)->orderby('date', 'desc')->get();
                        // dd($nutritionJournalInfoArr);
                        return view('account.account_nj', ['nutritionJournalInfoArr' => $nutritionJournalInfoArr, 'user'=>$user, 'week'=>$week]);
                    }
                }
            } else {
                return view('account.client_info', ['user'=>$user]);
            }
        }
        else{
            return redirect("login");
        }
    }

    public function analyzesView(){
        $user = Auth::user();
        return view('account.account_analyzes', ['user'=>$user]);
    }

    public function accountQuestionnaire($user_id){
        $user = Auth::user();
        return view('account.client_info',['user'=>$user]);
    }

    public function accountMaterials(){
        $user = Auth::user();
        $materials = Material::where('client_id', $user->id)->get();
        return view('account.account_materials', ['materials'=> $materials, 'user'=>$user]);
    }
    public function analysisLoading(Request $request){
        $validated = $request->validate(['file'=>'required',]);
        $file = $request->file('file');
        $user = Auth::user();
        $name = $file->getClientOriginalName();
        $lastDotPos = strrpos($name, '.');
        $extension = strrchr($name,'.');
        $onlyName = substr($name, 0, $lastDotPos);
        $newName = $user->id."_".$onlyName."_".time().$extension;
        $file->storeAs('analyzes', $newName);
        $newAnalysis = new Analysis;
        $newAnalysis->name = $newName;
        $newAnalysis->client_id = $user->id;
        $newAnalysis->save();
        return view('account.account_analyzes',['user'=>$user]);
    }
    public function analysisReading($filename){
        // $analysis = Analysis::firstWhere('id', $id);
        // $filename = $analysis->name;
        $path="";
        if(Storage::disk('analyzes')->exists("$filename")) {
            $path = Storage::disk('analyzes')->path($filename);
        }
        return response()->file($path);
    }
    public function accountRecommendations(){
        $user = Auth::user();
        $recs = Recommendation::where('client_id', $user->id)->orderby('date')->get();
        return view('account.account_recommendations', ['user'=>$user, 'recommendations'=>$recs]);
    }
    public function anamnesisComplete(Request $request){
        
        //dd($request->has('gain_weight'));
        //dd($request);
         $validated = $request->validate([
            'fio'=> 'required|max:255',
            'birthday'=> 'required',
            'city'=>'required|max:255',
            'phone'=> 'required|max:20',
            'reasons_for_consultation'=> 'required|max:500',
            'desired_results'=> 'required|max:500',
            'height'=> 'required|max:255',
            'weight'=> 'required|max:255',
            'weight_fluctuations'=> 'nullable|max:255',
            'waist_circumference'=> 'required|max:255',
            'desire_weight'=> 'required|max:255',
            'extra_info' =>'nullable|max:1000',

            'marital_status'=> 'nullable|max:255',
            'children'=> 'nullable|max:255',
            'children_age'=> 'nullable|max:255',

            'profession'=> 'required|max:255',
            //'do_like_your_working'=> 'required|max:255',
            'work_character'=> 'required|max:255',
            'working_history'=> 'nullable|max:500',
            'hobby'=> 'required|max:255',
            'rest'=> 'required|max:255',
            'sport'=> 'required|max:255',
            'driving_time'=> 'required|max:255',
            'transport_time'=> 'required|max:255',
            'pc_time'=> 'required|max:255',
            'working_time'=> 'required|max:255',
            'walking_time'=> 'required|max:255',

            'cigarets_per_day'=> 'nullable|max:255',
            'alcohol_how_often'=> 'nullable|max:255',
            'what_alcohol'=> 'nullable|max:255',
            'another_dependencies'=> 'nullable|max:255',

            'main_meals_amount'=> 'required|max:255',
            'meals_amount'=> 'required|max:255',
            'food_limit'=> 'nullable|max:255',
            'food_intolerance'=> 'nullable|max:255',
            'food_allergy'=> 'nullable|max:255',
            'what_drink'=> 'required|max:255',
            'cups_of_tea_coffee'=> 'nullable|max:255',
            'cooking_oil'=> 'nullable|max:255',
            'sugar_source'=> 'nullable|max:255',
            'favorite_food'=> 'nullable|max:255',
            'food_cravings'=> 'nullable|max:255',
            'food_avoid'=> 'nullable|max:255',
            'diet'=> 'nullable|max:255',

            'bedtime'=> 'required|max:255',
            'rising_time'=> 'nullable|max:255',
            'do_you_feel_rest'=> 'required|max:255',
            'asleep_time'=> 'required|max:255',
            'doy_you_fall_asleep_easly'=> 'nullable|max:255',
            'nightly_awakening'=> 'nullable|max:255',
            'daily_routine'=>'required|max:500',

            'another'=>'nullable|max:255',

            'med_question_1'=> 'nullable|max:500',
            'med_question_2'=> 'nullable|max:300',
            'med_question_8'=> 'nullable|max:300',

            'med_question_9'=> 'nullable|max:500',
            'med_question_10'=> 'nullable|max:500',
            'med_question_11'=> 'nullable|max:500',
            'med_question_12'=> 'nullable|max:500',

            'med_question_13'=>'nullable|max:255',
            'med_question_14'=>'nullable|max:255',
            'med_question_15'=>'nullable|max:255',
            'med_question_16'=>'nullable|max:255',
            'med_question_17'=>'nullable|max:255',
            'med_question_18'=>'nullable|max:255',
            'med_question_19'=>'nullable|max:255',

            'med_question_20'=>'nullable|max:255',
            'med_question_21'=>'nullable|max:255',
            'med_question_22'=>'nullable|max:255',

            'med_question_23'=>'nullable|max:255',
            'med_question_24'=>'nullable|max:255',
            'med_question_25'=>'nullable|max:255',
            'med_question_26'=>'nullable|max:255',
            'med_question_27'=>'nullable|max:255',
            'med_question_28'=>'nullable|max:255',
            'med_question_29'=>'nullable|max:255',
            'med_question_30'=>'nullable|max:255',
            'med_question_31'=>'nullable|max:255',

            'med_question_32'=>'nullable|max:255',
            'med_question_33'=>'nullable|max:255',
            'med_question_34'=>'nullable|max:255',

            'med_question_35'=>'nullable|max:255',

            'med_question_36'=>'nullable|max:255',
            'med_question_37'=>'nullable|max:255',
            'med_question_38'=>'nullable|max:255',
            'med_question_39'=>'nullable|max:255',
            'med_question_40'=>'nullable|max:255',

            'med_question_41'=>'nullable|max:255',
            'med_question_42'=>'nullable|max:255',

            'med_question_43'=>'nullable|max:255',
            'med_question_44'=>'nullable|max:255',
            'med_question_45'=>'nullable|max:255',
            'med_question_46'=>'nullable|max:255',
            'med_question_47'=>'nullable|max:255',

            'mother'=>'nullable|max:255',
            'father'=>'nullable|max:255',
            'grandma'=>'nullable|max:255',
            'grandpa'=>'nullable|max:255',
            'brothers'=>'nullable|max:255',
            'sisters'=>'nullable|max:255',

            'woman_question_1'=>'nullable|max:255',
            'woman_question_2'=>'nullable|max:255',
            'woman_question_3'=>'nullable|max:255',
            'woman_question_4'=>'nullable|max:255',
            'woman_question_6'=>'nullable|max:255',
            'woman_question_7'=>'nullable|max:255',
            'woman_question_8'=>'nullable|max:255',
            'woman_question_9'=>'nullable|max:255',
            'woman_question_10'=>'nullable|max:255',
            'woman_question_11'=>'nullable|max:255',
            'woman_question_12'=>'nullable|max:255',
        ]);
        //dd($validated);
        //dd($request->date_of_completion);
        DB::transaction(function () use ($request):void {
            //$general = ClientGeneralData::firstWhere('client_id', Auth::user()->id);
            //dd($request->date_of_completion);
            $general = new ClientGeneralData;
            $general->client_id = Auth::user()->id;
            $general->date_of_completion = $request->date_of_completion;
            $general->fio = $request->fio;
            $general->birthday = $request->birthday;
            $general->city = $request->city;
            $general->phone = $request->phone;
            $general->email = $request->email;
            $general->reasons_for_consultation = $request->reasons_for_consultation;
            $general->desired_results = $request->desired_results;
            $general->height = $request->height;
            $general->weight = $request->weight;
            $general->weight_fluctuations = $request->weight_fluctuations;
            $general->waist_circumference = $request->waist_circumference;
            $general->gain_weight = $request->has('gain_weight') ? 1 : 0;
            $general->lose_weight = $request->has('lose_weight') ? 1 : 0;
            $general->save_weight = $request->has('save_weight') ? 1 : 0;
            $general->desire_weight = $request->desire_weight;
            $general->extra_info = $request->extra_info;
            $general->save();

            $badHabits = new ClientBadHabitsData;
            $badHabits->client_id = Auth::user()->id;
            $badHabits->smoking = $request->has('smoking') ? 1 : 0;
            $badHabits->cigarets_per_day = $request->cigarets_per_day;
            $badHabits->do_you_want_quit_smoking = $request->has('do_you_want_quit_smoking') ? 1 : 0;
            $badHabits->alcohol = $request->has('alcohol') ? 1 : 0;
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
            $dream->snores = $request->has('snores') ? 1 : 0;
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
            $work->do_like_your_working	 = $request->has('do_like_your_working') ? 1 : 0;
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
            $family->children = $request->has('children') ? 1 : 0;
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
            $medicineHistory->massage = $request->has('massage') ? 1 : 0;
            $medicineHistory->osteopath = $request->has('osteopath') ? 1 : 0;
            $medicineHistory->nutrition = $request->has('nutrition') ? 1 : 0;
            $medicineHistory->supplements = $request->has('supplements') ? 1 : 0;
            $medicineHistory->sport_bool = $request->has('sport_bool') ? 1 : 0;
            $medicineHistory->herb = $request->has('herb') ? 1 : 0;
            $medicineHistory->drugs = $request->has('drugs') ? 1 : 0;
            $medicineHistory->another = $request->another;
            $medicineHistory->med_question_1 = $request->med_question_1;
            $medicineHistory->med_question_2 = $request->med_question_2;
            $medicineHistory->med_question_3 = $request->has('med_question_3') ? 1 : 0;
            $medicineHistory->med_question_4 = $request->has('med_question_4') ? 1 : 0;
            $medicineHistory->med_question_5 = $request->has('med_question_5') ? 1 : 0;
            $medicineHistory->med_question_6 = $request->has('med_question_6') ? 1 : 0;
            $medicineHistory->med_question_7 = $request->has('med_question_7') ? 1 : 0;
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
        });
        return redirect()->route('account_nj');
    }

    public function journalSave(Request $request){

        $validated = $request->validate([        
            'sleepDuration'=> 'nullable|max:255',
            'risingTime'=> 'nullable|max:255',
            'sleepQuality'=> 'nullable|max:255',
            'wasRisingEasy'=> 'nullable|max:255',
            'bedtime'=> 'nullable|max:255',
            'dailyPhysicActivity'=> 'nullable|max:255',
            'dailyEnergyLevel'=> 'nullable|max:255',
            'waterVolume'=> 'nullable|max:255',
            'conditionChanges'=> 'nullable|max:255',
            'hardestMoment'=> 'nullable|max:255',
            'dailyPersonalVictories'=> 'nullable|max:255',
            'b_dish'=> 'nullable|max:255',
            'b_mealtime'=> 'nullable|max:255',
            'b_hungerScale'=> 'nullable|max:10|min:1|numeric',
            'b_iEatBecause'=> 'nullable|max:500',
            'b_afterEatingFeeling'=> 'nullable|max:500',
            'b_someHoursAfterEatingFeeling'=> 'nullable|max:500',
            'b_anotherNote'=> 'nullable|max:1000',
            'fl_dish'=> 'nullable|max:255',
            'fl_mealtime'=> 'nullable|max:255',
            'fl_hungerScale'=> 'nullable|max:10|min:1|numeric',
            'fl_iEatBecause'=> 'nullable|max:255',
            'fl_afterEatingFeeling'=> 'nullable|max:255',
            'fl_someHoursAfterEatingFeeling'=> 'nullable|max:255',
            'fl_anotherNote'=> 'nullable|max:1000',
            'd_dish'=> 'nullable|max:255',
            'd_mealtime'=> 'nullable|max:255',
            'd_hungerScale'=> 'nullable|max:10|min:1|numeric',
            'd_iEatBecause'=> 'nullable|max:1000',
            'd_afterEatingFeeling'=> 'nullable|max:1000',
            'd_someHoursAfterEatingFeeling'=> 'nullable|max:1000',
            'd_anotherNote'=> 'nullable|max:1000',
            'sl_dish'=> 'nullable|max:255',
            'sl_mealtime'=> 'nullable|max:255',
            'sl_hungerScale'=> 'nullable|max:10|min:1|numeric',
            'sl_iEatBecause'=> 'nullable|max:1000',
            'sl_afterEatingFeeling'=> 'nullable|max:1000',
            'sl_someHoursAfterEatingFeeling'=> 'nullable|max:1000',
            'sl_anotherNote'=> 'nullable|max:1000',
            's_dish'=> 'nullable|max:255',
            's_mealtime'=> 'nullable|max:255',
            's_hungerScale'=> 'nullable|max:10|min:1|numeric',
            's_iEatBecause'=> 'nullable|max:1000',
            's_afterEatingFeeling'=> 'nullable|max:1000',
            's_someHoursAfterEatingFeeling'=> 'nullable|max:1000',
            's_anotherNote'=> 'nullable|max:1000',
            'tl_dish'=> 'nullable|max:255',
            'tl_mealtime'=> 'nullable|max:255',
            'tl_hungerScale'=> 'nullable|max:10|min:1|numeric',
            'tl_iEatBecause'=> 'nullable|max:1000',
            'tl_afterEatingFeeling'=> 'nullable|max:1000',
            'tl_someHoursAfterEatingFeeling'=> 'nullable|max:1000',
            'tl_anotherNote'=> 'nullable|max:1000']);
        
        $data = DailyGeneral::firstWhere('date', $request->date);

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
        $data->save();
        
        $breakfast = Breakfast::firstWhere('daily_general_id', $data->id);
        $breakfast->b_dish = $request->b_dish;
        $breakfast->b_mealtime = $request->b_mealtime;
        $breakfast->b_hungerScale = $request->b_hungerScale;
        $breakfast->b_iEatBecause = $request->b_iEatBecause;
        $breakfast->b_afterEatingFeeling = $request->b_afterEatingFeeling;
        $breakfast->b_someHoursAfterEatingFeeling = $request->b_someHoursAfterEatingFeeling;
        $breakfast->b_anotherNote = $request->b_anotherNote;
        $breakfast->save();

        $dinner = Dinner::firstWhere('daily_general_id', $data->id);
        $dinner->d_dish = $request->d_dish;
        $dinner->d_mealtime = $request->d_mealtime;
        $dinner->d_hungerScale = $request->d_hungerScale;
        $dinner->d_iEatBecause = $request->d_iEatBecause;
        $dinner->d_afterEatingFeeling = $request->d_afterEatingFeeling;
        $dinner->d_someHoursAfterEatingFeeling = $request->d_someHoursAfterEatingFeeling;
        $dinner->d_anotherNote = $request->d_anotherNote;
        $dinner->save();

        $supper = Supper::firstWhere('daily_general_id', $data->id);
        $supper->s_dish = $request->s_dish;
        $supper->s_mealtime = $request->s_mealtime;
        $supper->s_hungerScale = $request->s_hungerScale;
        $supper->s_iEatBecause = $request->s_iEatBecause;
        $supper->s_afterEatingFeeling = $request->s_afterEatingFeeling;
        $supper->s_someHoursAfterEatingFeeling = $request->s_someHoursAfterEatingFeeling;
        $supper->s_anotherNote = $request->s_anotherNote;
        $supper->save();

        $firstLunch = FirstLunch::firstWhere('daily_general_id', $data->id);
        $firstLunch->fl_dish = $request->fl_dish;
        $firstLunch->fl_mealtime = $request->fl_mealtime;
        $firstLunch->fl_hungerScale = $request->fl_hungerScale;
        $firstLunch->fl_iEatBecause = $request->fl_iEatBecause;
        $firstLunch->fl_afterEatingFeeling = $request->fl_afterEatingFeeling;
        $firstLunch->fl_someHoursAfterEatingFeeling = $request->fl_someHoursAfterEatingFeeling;
        $firstLunch->fl_anotherNote = $request->fl_anotherNote;
        $firstLunch->save();

        $secondLunch = SecondLunch::firstWhere('daily_general_id', $data->id);
        $secondLunch->sl_dish = $request->sl_dish;
        $secondLunch->sl_mealtime = $request->sl_mealtime;
        $secondLunch->sl_hungerScale = $request->sl_hungerScale;
        $secondLunch->sl_iEatBecause = $request->sl_iEatBecause;
        $secondLunch->sl_afterEatingFeeling = $request->sl_afterEatingFeeling;
        $secondLunch->sl_someHoursAfterEatingFeeling = $request->sl_someHoursAfterEatingFeeling;
        $secondLunch->sl_anotherNote = $request->sl_anotherNote;
        $secondLunch->save();

        $thirdLunch = ThirdLunch::firstWhere('daily_general_id', $data->id);
        $thirdLunch->tl_dish = $request->tl_dish;
        $thirdLunch->tl_mealtime = $request->tl_mealtime;
        $thirdLunch->tl_hungerScale = $request->tl_hungerScale;
        $thirdLunch->tl_iEatBecause = $request->tl_iEatBecause;
        $thirdLunch->tl_afterEatingFeeling = $request->tl_afterEatingFeeling;
        $thirdLunch->tl_someHoursAfterEatingFeeling = $request->tl_someHoursAfterEatingFeeling;
        $thirdLunch->tl_anotherNote = $request->tl_anotherNote;
        $thirdLunch->save();

        return redirect('/account_nj');
    }

}
