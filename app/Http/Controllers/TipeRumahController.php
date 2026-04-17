<?php

namespace App\Http\Controllers;

use App\Models\TipeRumah;
use Illuminate\Http\Request;

class TipeRumahController extends Controller
{
    public function index()
    {
        $data = TipeRumah::all();
        return view('tiperumah.index', compact('data'));
    }

    public function create()
    {
        return view('tiperumah.create');
    }

    public function store(Request $request)
    {
        TipeRumah::create($request->all());
        return redirect('/tiperumah');
    }

public function edit($id)
{
    $tipe = TipeRumah::findOrFail($id);
    return view('tiperumah.edit', compact('tipe'));
}

public function update(Request $request, $id)
{
    $tipe = TipeRumah::findOrFail($id);

    $tipe->update([
        'nama_tipe' => $request->nama_tipe,
        'deskripsi' => $request->deskripsi
    ]);

    return redirect('/tiperumah')->with('success', 'Data berhasil diupdate');
}

public function destroy($id)
{
    $tipe = TipeRumah::findOrFail($id);
    $tipe->delete();

    return redirect()->route('admin.dashboard')
        ->with('success', 'Data tipe rumah berhasil dihapus');
}
}