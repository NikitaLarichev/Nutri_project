<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Material;

class ClientListModal extends Component
{
    public $clients=[];
    public $materials=[];
    public $material_id="";

    public function mount(){
        $this->clients = User::where('status', 'client')->get();
        $admin = User::firstWhere('role','admin');
        $this->materials = Material::where('client_id', $admin->id)->get();
    }

    public function showClientListModal($mat_id){
        $this->dispatch('show-clients-modal', mat_id: $mat_id);
    }

    public function hideClientListModal(){
        $this->dispatch('hide-clients-modal');
    }
    public function sendMatToClient($client_id){
       $newMaterial = new Material;
       $newMaterial->client_id = $client_id;
       $newMaterial->name = Material::firstWhere('id', $this->material_id)->name;
       $newMaterial->save();
       $this->dispatch('hide-clients-modal');
    }

    public function render()
    {
        return view('livewire.client-list-modal', ['clients' => $this->clients, 'materials'=> $this->materials]);
    }
}
