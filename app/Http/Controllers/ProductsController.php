<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['products'=>$products]);
    }

    public function productCreate(Request $request){
        $validated = $request->validate([
            'name'=>'required|max:50',
            'short_desc'=>'max:300',
            'description'=>'max:800',
            'price'=>'required|max:20',
            'imgFile'=>'mimes:jpg']);

        $name = $request->imgFile->getClientOriginalName();
        $lastDotPos = strrpos($name, '.');
        $extension = strrchr($name,'.');
        $onlyName = substr($name, 0, $lastDotPos);
        $newName = $onlyName."_".time().$extension;
        $path = $request->imgFile->storeAs('prod_images', $newName);

        $product = new Product;
        $product->name = $request->name;
        $product->short_description = $request->short_desc;
        $product->description = $request->description;
        $product->image_path = $path;
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
