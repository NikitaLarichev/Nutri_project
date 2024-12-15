<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutMeController extends Controller
{
    public function index()
    {
        $files = Storage::files('diploms');
        return view('about_me', ['diploms'=>$files]);
    }

    public function addDiplom(Request $request){
        $validated = $request->validate(['file'=>'required']);
        $file = $request->file;
        $name = $file->getClientOriginalName();
        $lastDotPos = strrpos($name, '.');
        $extension = strrchr($name,'.');
        $onlyName = substr($name, 0, $lastDotPos);
        $newName = $onlyName."_".time().$extension;
        $file->storeAs('diploms', $newName);
        return redirect('about_me');
    }

    public function deleteDiplom($path){
        Storage::delete($path);
        return redirect('about_me');
    }
}
