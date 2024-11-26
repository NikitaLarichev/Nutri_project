<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientProduct;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['products'=>$products]);
    }

    public function productCreate(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->short_description = $request->short_desc;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect('products');
    }

    public function productUpdate(Request $request){
        $product = Product::firstWhere('id', $request->id);
        $product->name = $request->name;
        $product->short_description = $request->short_desc;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect('products');
    }

    public function productDelete($product_id){
        $product = Product::firstWhere('id', $product_id);
        $product->delete();
        return redirect('products');
    }

}
