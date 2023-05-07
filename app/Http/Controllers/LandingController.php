<?php

namespace App\Http\Controllers;

use App\Models\AppsDetail;
use App\Models\ImageAsset;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $apps = AppsDetail::find(1);
        $bigImage = ImageAsset::where('is_main', true)->inRandomOrder()->first();
        $smallImage = ImageAsset::where('is_main', false)->inRandomOrder()->get();
        return view('welcome')
            ->with('apps', $apps)
            ->with('bigImage', $bigImage)
            ->with('smallImage', $smallImage);
    }

    public function edit()
    {
        $apps = AppsDetail::find(1);
        return view('home.edit', compact('apps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'profil'=>'required',
            'visi'=>'required',
            'misi'=>'required',
        ]);
        AppsDetail::where('id', 1)->update($request->except(['_token']));
        return redirect()->route('home');
    }

    public function destroy()
    {

    }
}
