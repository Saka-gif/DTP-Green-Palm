<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use App\Models\TipeRumah;

class RumahController extends Controller
{
    public function index()
    {
        $data = Rumah::all();
        return view('rumah.index', compact('data'));
    }

    public function create()
    {
        $tipe = TipeRumah::all();
        return view('rumah.create', compact('tipe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rumah' => 'required',
            'harga' => 'required|numeric',
            'lokasi' => 'required',
            'status' => 'required',
            'tipe_id' => 'required|exists:tipe_rumah,id',

            'deskripsi' => 'nullable',
            'luas_tanah' => 'nullable',
            'luas_bangunan' => 'nullable',
            'kamar_tidur' => 'nullable|numeric',
            'kamar_mandi' => 'nullable|numeric',
            'lantai' => 'nullable|numeric',
            'carport' => 'nullable|numeric',

            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['foto'] = $filename;
        }

        Rumah::create($data);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Data rumah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rumah = Rumah::findOrFail($id);
        $tipe = TipeRumah::all();
        return view('rumah.edit', compact('rumah', 'tipe'));
    }

    public function update(Request $request, $id)
    {
        $rumah = Rumah::findOrFail($id);

        $request->validate([
            'nama_rumah' => 'required',
            'harga' => 'required|numeric',
            'lokasi' => 'required',
            'status' => 'required',
            'tipe_id' => 'required|exists:tipe_rumah,id',

            'deskripsi' => 'nullable',
            'luas_tanah' => 'nullable',
            'luas_bangunan' => 'nullable',
            'kamar_tidur' => 'nullable|numeric',
            'kamar_mandi' => 'nullable|numeric',
            'lantai' => 'nullable|numeric',
            'carport' => 'nullable|numeric',

            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($rumah->foto && file_exists(public_path('images/' . $rumah->foto))) {
                unlink(public_path('images/' . $rumah->foto));
            }

            $file = $request->file('foto');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['foto'] = $filename;
        }

        $rumah->update($data);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Data rumah berhasil diupdate');
    }

    public function destroy($id)
    {
        $rumah = Rumah::findOrFail($id);

        if ($rumah->foto && file_exists(public_path('images/' . $rumah->foto))) {
            unlink(public_path('images/' . $rumah->foto));
        }

        $rumah->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Data rumah berhasil dihapus');
    }

    public function show($id)
    {
        $rumah = Rumah::findOrFail($id);
        return view('rumah.detail', compact('rumah'));
    }

    // ================= USER =================

    public function home()
    {
        $rumah = Rumah::all();
        return view('index', compact('rumah'));
    }

    public function detailUser($id)
    {
        $rumah = Rumah::findOrFail($id);
        return view('detail', compact('rumah'));
    }
}