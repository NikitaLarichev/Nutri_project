<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\ClientProduct;
use App\Models\Product;

class ClientList extends Component
{
    public $users=[];
    public $products=[];
    public $client_products=[];
    public $status=[];
    public $allStatus=[];
    public $current_products_id=[];
    public $current_products=[];

    public $user_id;
    public $product_id;

    public function mount(){
        $this->users = User::where('role', '!=', 'admin')->get();
        $this->client_products = ClientProduct::all();
        $this->products = Product::all();
        $this->allStatus=['user', 'blocked'];
        $this->current_products = [$this->users->count()];
        $this->current_products_id = [$this->users->count()];
        foreach($this->users as $index => $user){
            $this->status[$index] = $user->status;
            $this->current_products[$index] = null;
            $this->current_products_id[$index] = null;
            foreach($this->client_products as $cp){
                if($cp->client_id == $user->id){
                    if($cp->end_date == null){
                        $this->current_products[$index] = Product::firstWhere('id', $cp->product_id);
                        $this->current_products_id[$index] = $cp->id;
                        break;
                    }
                }
            }          
        }
    }
    public function clientProductCreate($index){
       // dd(33);
        $user = User::firstWhere('id', $this->users[$index]->id);
        if($this->current_products_id[$index] == null) return;
        if(ClientProduct::where('client_id', $user->id)->where('end_date', null)->first() != null) return;
        $client_product = new ClientProduct;
        $client_product->client_id = $user->id;
        $client_product->product_id = $this->current_products_id[$index];
        $client_product->start_date = date('y-m-d');
        $client_product->save();
        $user->status = 'client';
        $user->save();
        $this->dispatch('refresh');
    }

    public function clientProductFinish($index){
        $user = User::firstWhere('id', $this->users[$index]->id);
        if($user -> status == 'blocked') return;
        $user->status = 'user';
        $user->save();
        $client_product = ClientProduct::where('client_id', $user->id)->where('end_date', null)->first();
        if($client_product == null) return;
        $client_product->end_date = date('y-m-d');
        $client_product->save();
        $this->dispatch('refresh');
    }

    public function refresh(){
        $this->dispatch('$refresh');
    }
    public function changeUserStatus($id, $index){
        $user = User::firstWhere('id', $id);
        $user->status = $this->status[$index];
        if($this->status[$index] != 'blocked'){
            $client_product = ClientProduct::where('client_id', $user->id)->where('end_date', null)->first();
            if($client_product != null){
                $user->status = 'client';
            }
            else{
                $user->status = 'user';
            }
        }
        $user->save();
        $this->dispatch('refresh');
    }

    public function render()
    {
        $this->mount();
        return view('livewire.client-list', ['users'=>$this->users, 'products'=>$this->products, 'client_products'=>$this->client_products, 'allStatus'=>$this->allStatus, 'current_products'=>$this->current_products]);
    }
}
