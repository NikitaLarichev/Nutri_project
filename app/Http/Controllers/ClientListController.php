<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;

class ClientListController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('role','=','user')->get();
        $products = Product::all();
        return view('client_list', ['users'=>$users, 'products'=>$products]);
    }

    public function createProduct(Request $request){
        $product = new Product;
        $product->name = $request->product_name;
        $product->client_id = $request->client_id;
        $product->start_date = $request->start_date;
        $product->save();
    }

    public function finishProduct(Request $request){
        $product = Product::firstWhere('id', $request->product_id);
        $product->end_date = $request->finish_date;
        $product->save();
    }
}
