<?php

namespace App\Http\Controllers;

use App\Models\FileDrive;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileDriveController extends Controller
{
    public function index()
    {
        $data = FileDrive::all();
        return view('file-drives.index')
            ->with('data', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_gambar' => 'required',
        ]);
//        $newData = Data::create($request->except(['_token', 'file_gambar']));
        if ($request->file('file_gambar')){

            $destinationPath = 'assets/files';
//            $myImage = Carbon::now()->timestamp.'.'. $request->file('file_gambar')->getClientOriginalExtension();
            $myImage = $request->file('file_gambar')->getClientOriginalName();
            $request->file('file_gambar')->move(public_path($destinationPath), $myImage);
            $path = $destinationPath .'/'. $myImage;

//            $name =  Carbon::now()->timestamp .'_'. $request->file('file_gambar')->getClientOriginalName();
//            $path = $request->file('file_gambar')->storeAs(
//                'data',
//                $name
//            );
            $data = new FileDrive();
            $data->file = $path;
            $data->save();
        }
        return redirect()->route('file-drives.index');
    }

    public function destroy($id)
    {
        $data = FileDrive::where('id', $id)->first();
        if($data->file){
            File::delete(public_path($data->file));
//            Storage::delete($data->file);
        }
        $data->delete();
        return redirect()->route('file-drives.index');
    }
}
