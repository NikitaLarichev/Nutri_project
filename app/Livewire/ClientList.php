<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\ClientProduct;

class ClientList extends Component
{
    public $users=[];
    public $products=[];
    public $status=[];
    public $allStatus=[];

    public function mount(){
        $this->users = User::where('role', '!=', 'admin')->get();
        $this->products = ClientProduct::all();
        $this->allStatus=['user','client','blocked'];
        foreach($this->users as $index => $user){
            $this->status[$index] = $user->status;
        }
    }

    public function changeUserStatus($id, $index){
        $user = User::firstWhere('id', $id);
        $user->status = $this->status[$index];
        $user->save();
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.client-list', ['users'=>$this->users, 'products'=>$this->products, 'allStatus'=>$this->allStatus]);
    }
}
