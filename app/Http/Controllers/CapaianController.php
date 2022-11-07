<?php

namespace App\Http\Controllers;

use App\Models\Capaian;
use Illuminate\Http\Request;

class CapaianController extends Controller
{
    public function index()
    {
        $data = Capaian::all();
        return view('capaian.index', compact('data'));
    }

    public function create()
    {
        return view('capaian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|max_digits:4',
            'target' => 'required',
            'capaian' => 'required',
        ]);

        Capaian::create($request->except(['_token']));
        return redirect()->route('capaian.index');
    }

    public function edit($id)
    {
        $data = Capaian::findOrFail($id);
        return view('capaian.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'target' => 'required',
            'capaian' => 'required',
        ]);

        Capaian::where('id', $id)->update($request->except(['_token']));
        return redirect()->route('capaian.index');
    }

    public function destroy($id)
    {
        Capaian::where('id', $id)->delete();
        return redirect()->route('capaian.index');
    }

}
