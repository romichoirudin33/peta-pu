<?php

namespace App\Http\Controllers;

use App\Models\AppsDetail;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $apps = AppsDetail::find(1);
        return view('welcome', compact('apps'));
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
