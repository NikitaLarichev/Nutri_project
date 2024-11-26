<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaterialsStorageController extends Controller
{
    public function index()
    {
        $materials = Material::where('client_id', Auth::user()->id)->get();
        return view('client.materials_storage', ['materials'=>$materials]);
    }

    public function materialLoading(Request $request){
        //$validated = $request->validate(['file'=>'file|mimetypes:application/pdf,text/plain,application/octet-stream,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'description'=>'required|max:500']);
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $lastDotPos = strrpos($name, '.');
        $extension = strrchr($name,'.');
        $onlyName = substr($name, 0, $lastDotPos);
        $newName = $onlyName."_".time().$extension;
        $file->storeAs('materials', $newName);
        $newMaterial = new Material;
        $newMaterial->name = $newName;
        $newMaterial->client_id = Auth::user()->id;
        $newMaterial->save();
        return redirect('/materials_storage');
    }

    public function readMaterial($filename){
        $path="";
        if(Storage::disk('materials')->exists("$filename")) {
            $path = Storage::disk('materials')->path($filename);
        }
        return response()->file($path);
    }
    

    public function downloadMaterial($filename){
        return Storage::download("materials/$filename");
    }

    public function deleteMaterial($filename){
        if(Storage::disk('materials')->exists("$filename")){
           try{
                $material = Material::firstWhere('name',"$filename");
                $material->delete();
           }catch(Exception){
            return redirect('/materials_storage');
           }
           Storage::delete("materials/$filename");
        }
        return redirect('/materials_storage');
    }
}
