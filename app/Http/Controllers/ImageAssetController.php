<?php

namespace App\Http\Controllers;

use App\Models\ImageAsset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageAssetController extends Controller
{
    public function index()
    {
        $data = ImageAsset::all();
        return view('image-assets.index', compact('data'));
    }

    public function create()
    {
        return view('image-assets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_gambar' => 'required',
        ]);
//        $newData = Data::create($request->except(['_token', 'file_gambar']));
        if ($request->file('file_gambar')){

            $destinationPath = 'assets/images';
            $myImage = Carbon::now()->timestamp.'.'. $request->file('file_gambar')->getClientOriginalExtension();
            $request->file('file_gambar')->move(public_path($destinationPath), $myImage);
            $path = $destinationPath .'/'. $myImage;

//            $name =  Carbon::now()->timestamp .'_'. $request->file('file_gambar')->getClientOriginalName();
//            $path = $request->file('file_gambar')->storeAs(
//                'data',
//                $name
//            );
            $data = new ImageAsset();
            $data->name_file = $path;
            $data->is_main = $request->is_main;
            $data->save();
        }
        return redirect()->route('image-assets.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $data = ImageAsset::where('id', $id)->first();
        if($data->name_file){
            File::delete(public_path($data->name_file));
//            Storage::delete($data->file);
        }
        $data->delete();
        return redirect()->route('image-assets.index');
    }
}
