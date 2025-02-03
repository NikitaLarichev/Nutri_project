<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Analysis;
use Illuminate\Support\Facades\Storage;

class Analyzes extends Component
{
    public $user_id;
    public $analyzes = [];

    public function mount(){
        $this->analyzes = Analysis::where('client_id', $this->user_id)->get();
    }

    public function refresh(){
        $this->dispatch('$refresh');
    }

    public function analysisDelete($id){
        $analysis = Analysis::firstWhere('id', $id);
        $filename = $analysis->name;
        $analysis->delete();

        if(Storage::disk('analyzes')->exists("$filename")){
            Storage::delete("analyzes/$filename");
        }
        $this->dispatch('del_refresh');
    }

    public function analysisDownload($id){
        $analysis = Analysis::firstWhere('id', $id);
        $filename = $analysis->name;
        return Storage::disk('analyzes')->download("$filename");
    }

    public function render()
    {
        return view('livewire.analyzes', ['analyzes'=>$this->analyzes]);
    }
}
