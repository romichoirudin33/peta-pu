<?php

namespace App\Http\Controllers;

use App\Models\Peta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PetaController extends Controller
{
    public function index()
    {
        $data = Peta::all();
        return view('peta.index', compact('data'));
    }

    public function create()
    {
        return view('peta.create');
    }

    public function store(Request $request)
    {
        $destinationPath = 'assets/peta';
        $myImage = Carbon::now()->timestamp.'.'. $request->file('file_gambar')->getClientOriginalExtension();
        $request->file('file_gambar')->move(public_path($destinationPath), $myImage);
        $path = $destinationPath .'/'. $myImage;

//        $name =  Carbon::now()->timestamp .'_'. $request->file('file_gambar')->getClientOriginalName();
//        $path = $request->file('file_gambar')->storeAs(
//            'peta',
//            $name
//        );
        $data = new Peta();
        $data->file = $path;
        $data->save();

        return redirect()->route('peta.index');
    }

    public function edit($id)
    {
        $data = Peta::findOrFail($id);
        return view('peta.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = Peta::findOrFail($id);
        if($data->file){
            File::delete(public_path($data->file));
//            Storage::delete($data->file);
        }

        $destinationPath = 'assets/peta';
        $myImage = Carbon::now()->timestamp.'.'. $request->file('file_gambar')->getClientOriginalExtension();
        $request->file('file_gambar')->move(public_path($destinationPath), $myImage);
        $path = $destinationPath .'/'. $myImage;

//        $name =  Carbon::now()->timestamp .'_'. $request->file('file_gambar')->getClientOriginalName();
//        $path = $request->file('file_gambar')->storeAs(
//            'peta',
//            $name
//        );
        $data->file = $path;
        $data->save();

        return redirect()->route('peta.index');
    }

    public function destroy($id)
    {
        $data = Peta::where('id', $id)->first();
        if($data->file){
            File::delete(public_path($data->file));
//            Storage::delete($data->file);
        }
        $data->delete();
        return redirect()->route('peta.index');
    }
}
