<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
use App\Models\Product;

class ClientController extends Controller
{
    public function index($id)
    {
        $client = User::firstWhere('id',"$id");
        $products = Product::where('client_id', $client->id)->get();
        return view('client.client', ['client'=>$client, 'products'=>$products]);
    }

    public function clientNutritionJournal($id)
    {
        $nutritionJournalInfoArr = DailyGeneral::with('Breakfast', 'Dinner', 'Supper', 'FirstLunch', 'SecondLunch', 'ThirdLunch')->where('client_id', $id)->orderby('date', 'desc')->get();
        $client = User::firstWhere('id',"$id");
        return view('client.client_nj', ['client'=>$client, 'nutritionJournalInfoArr'=>$nutritionJournalInfoArr]);
    }

    public function clientRecommendations($id)
    {
        $client = User::firstWhere('id',"$id");
        $recs = Recommendation::where('client_id', "$id")->orderby('created_at', 'desc')->get();
        return view('client.client_recommendations', ['client'=>$client, 'recs'=>$recs]);
    }

    public function addRecommendation(Request $request)
    {
        $client = User::firstWhere('id',"$request->client_id");
        $rec = new Recommendation;
        $rec->client_id = $request->client_id;
        $rec->date = date('y-m-d');
        $rec->content = $request->content;
        $rec->save();
        return redirect("/client_recommendations/{$request->client_id}");
    }

    public function deleteRecommendation($rec_id)
    {
        $rec = Recommendation::firstWhere('id',"$rec_id");
        $client_id = $rec->client_id;
        $rec->delete();
        return redirect("/client_recommendations/{$client_id}");
    }

    public function clientQuestionnaire($id){
        $client = User::firstWhere('id',"$id");
        $clientGeneralData = null;
        $clientBadHabits = null;
        $clientFoodHabits = null;
        $clientFamilyData = null;
        $clientFamilyHistoryData = null;
        $clientWomanHealth = null;
        $clientWorkData = null;
        $clientMedicineHistoryData = null;
        $clientDreamData = null;
        if($client->anamnesisIsComplete == 1){
            $clientGeneralData = ClientGeneralData::firstWhere('client_id', $client->id);
            $clientBadHabits = ClientBadHabitsData::firstWhere('client_id', $client->id);
            $clientFoodHabits = ClientFoodHabitsData::firstWhere('client_id', $client->id);
            $clientFamilyData = ClientFamilyData::firstWhere('client_id', $client->id);
            $clientFamilyHistoryData = ClientFamilyHistoryData::firstWhere('client_id', $client->id);
            $clientWomanHealth = ClientWomanHealthData::firstWhere('client_id', $client->id);
            $clientWorkData = ClientWorkData::firstWhere('client_id', $client->id);
            $clientMedicineHistoryData = ClientMedicineHistoryData::firstWhere('client_id', $client->id);
            $clientDreamData = ClientDreamData::firstWhere('client_id', $client->id);
        }
        return view('client.client_questionnaire', ['client'=>$client, 'clientGeneralData'=>$clientGeneralData, 'clientBadHabits'=>$clientBadHabits,
        'clientFoodHabits'=>$clientFoodHabits, 'clientFamilyData'=>$clientFamilyData, 'clientFamilyHistoryData'=>$clientFamilyHistoryData,
        'clientWomanHealth'=>$clientWomanHealth, 'clientWorkData'=>$clientWorkData, 'clientMedicineHistoryData'=>$clientMedicineHistoryData,
        'clientDreamData'=>$clientDreamData]);
    }
}
