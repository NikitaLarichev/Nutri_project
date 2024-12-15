<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\ClientGeneralData;
use Telegram\Bot\Laravel\Facades\Telegram;
use Livewire\WithFileUploads;

class ProductsComponent extends Component
{
    use WithFileUploads;

    public $chat_id = '771061410';
    public $products=[];
    public $productId;
    public $productName;
    public $productShortDescription;
    public $productDescription;
    public $productPrice;
    public $imgFile;

    public $stmUser;
    public $stmName;
    public $stmTel;
    public $stmEmail;
    public $stmProduct;


    public function showStatementForm($product_id, $user_id = null){
        $product = Product::firstWhere('id', $product_id);
        $user = User::firstWhere('id', $user_id);
        $this->dispatch('show-statement-form', ['product'=>$product, 'user'=>$user]);
    }

    public function submitStatement(){
        $statement;
        if($this->stmUser == null){
            $statement = "Имя: ".$this->stmName."\nТелефон: ".$this->stmTel."\nПочта: ".$this->stmEmail."\nУслуга: ".$this->stmProduct['name']."\nСтатус: незарегистрированный пользователь";
        }
        else{
            $cgd = ClientGeneralData::firstWhere('client_id', $this->stmUser['id']);
            $tel = $cgd == null ? null : $cgd->phone; 
            if($tel == null) $tel = "";
            $statement = "Имя: ".$this->stmUser['name']."\nТелефон: ".$tel."\nПочта: ".$this->stmUser['email']."\nУслуга: ".$this->stmProduct['name']."\nСтатус: зарегистрированный пользователь";
        }
        Telegram::sendMessage([
            'chat_id' => $this->chat_id,
            'text' => $statement
        ]);
        session()->flash('message', 'Ваша заявка отправлена');
        $this->dispatch('hide-update-form');
    }

    public function productUpdate(){
        // dd($this->imgFile);
        // $name = $this->imgFile->getClientOriginalName();
        // $lastDotPos = strrpos($name, '.');
        // $extension = strrchr($name,'.');
        // $onlyName = substr($name, 0, $lastDotPos);
        // $newName = $onlyName."_".time().$extension;
        // $path = $this->imgFile->storeAs('prod_images', $newName);

        $product = Product::firstWhere('id', $this->productId);
        $product->name = $this->productName;
        $product->short_description= $this->productShortDescription;
        $product->description = $this->productDescription;
        $product->price = $this->productPrice;
        // $product->image_path = $path;
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
