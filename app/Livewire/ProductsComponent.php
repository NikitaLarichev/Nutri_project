<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsComponent extends Component
{
    public $products=[];
    public $productId;
    public $productName;
    public $productShortDescription;
    public $productDescription;
    public $productPrice;

    public function productUpdate(){
        // dd($this->productId);
        $product = Product::firstWhere('id', $this->productId);
        $product->name = $this->productName;
        $product->short_description= $this->productShortDescription;
        $product->description = $this->productDescription;
        $product->price = $this->productPrice;
        $product->save();
        $this->dispatch('hide-update-form');
    }
    // public function mount(){
    //     $this->productId = 66;
    // }
    public function refresh(){
        $this->dispatch('refresh');
    }
    
    public function showUpdateForm($id){
        $this->dispatch('show-update-form', id: $id);
    }

    public function render()
    {
        return view('livewire.products-component');
    }
}
