<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\DataImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::all();
        return view('data.index', compact('data'));
    }

    public function show($id)
    {
        $data = Data::where('id', $id)->with('image')->firstOrFail();
        return view('data.show', compact('data'));
    }

    public function create()
    {
        return view('data.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pekerjaan_spam' => 'required',
            'anggaran' => 'required',
            'kondisi' => 'required',
            'dusun' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kabupaten' => 'required',
            'jumlah_terlayani' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'dimensi' => 'required',
            'panjang_pipa' => 'required',
        ]);

        $newData = Data::create($request->except(['_token', 'file_gambar']));
        if ($request->file('file_gambar')){

            $destinationPath = 'assets/data';
            $myImage = Carbon::now()->timestamp.'.'. $request->file('file_gambar')->getClientOriginalExtension();
            $request->file('file_gambar')->move(public_path($destinationPath), $myImage);
            $path = $destinationPath .'/'. $myImage;

//            $name =  Carbon::now()->timestamp .'_'. $request->file('file_gambar')->getClientOriginalName();
//            $path = $request->file('file_gambar')->storeAs(
//                'data',
//                $name
//            );
            $data = new DataImage();
            $data->data_id = $newData->id;
            $data->file = $path;
            $data->save();
        }
        return redirect()->route('data.index');
    }

    public function edit($id)
    {
        $data = Data::findOrFail($id);
        return view('data.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'pekerjaan_spam' => 'required',
            'anggaran' => 'required',
            'kondisi' => 'required',
            'dusun' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kabupaten' => 'required',
            'jumlah_terlayani' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'dimensi' => 'required',
            'panjang_pipa' => 'required',
        ]);


        Data::where('id', $id)->update($request->except(['_token', 'file_gambar']));

        if ($request->file('file_gambar')){

            $data = DataImage::where('data_id', $id)->first();

            if($data->file){
                File::delete(public_path($data->file));
//                Storage::delete($data->file);
            }

            $destinationPath = 'assets/data';
            $myImage = Carbon::now()->timestamp.'.'. $request->file('file_gambar')->getClientOriginalExtension();
            $request->file('file_gambar')->move(public_path($destinationPath), $myImage);
            $path = $destinationPath .'/'. $myImage;

//            $name =  Carbon::now()->timestamp .'_'. $request->file('file_gambar')->getClientOriginalName();
//            $path = $request->file('file_gambar')->storeAs(
//                'data',
//                $name
//            );
            $data->file = $path;
            $data->save();
        }

        return redirect()->route('data.index');
    }

    public function destroy($id)
    {
        Data::where('id', $id)->delete();
        $data = DataImage::where('data_id', $id)->first();
        if($data->file){
            File::delete(public_path($data->file));
//            Storage::delete($data->file);
        }
        $data->delete();
        return redirect()->route('data.index');
    }
}
