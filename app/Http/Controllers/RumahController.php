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

    'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
]);

    $data = $request->all(); 

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        $data['foto'] = $filename; // ⬅️ simpan ke $data
        Rumah::create($data);
        
        return redirect('/rumah')->with('success', 'Data berhasil ditambahkan');
    }

    Rumah::create($data); 

    return redirect('/rumah');
}

public function edit($id)
{
    $rumah = Rumah::find($id);
    return view('rumah.edit', compact('rumah'));
}

public function update(Request $request, $id)
{
    $data = Rumah::find($id);

   $request->validate([
    'nama_rumah' => 'required',
    'harga' => 'required|numeric',
    'lokasi' => 'required',
    'status' => 'required',

    'deskripsi' => 'nullable',
    'luas_tanah' => 'nullable',
    'luas_bangunan' => 'nullable',
    'kamar_tidur' => 'nullable|numeric',
    'kamar_mandi' => 'nullable|numeric',
    'lantai' => 'nullable|numeric',
    'carport' => 'nullable|numeric',

    'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
]);

    // CEK kalau upload foto baru
    if ($request->hasFile('foto')) {

        // hapus foto lama (opsional tapi bagus)
        if ($data->foto && file_exists(public_path('images/'.$data->foto))) {
            unlink(public_path('images/'.$data->foto));
        }

        $file = $request->file('foto');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);

        $data->foto = $filename;
    }

    // update data lain
    $data->nama_rumah = $request->nama_rumah;
    $data->harga = $request->harga;
    $data->lokasi = $request->lokasi;
    $data->save();

    return redirect('/rumah');
}

public function destroy($id)
{
    $rumah = Rumah::find($id);
    $rumah->delete();
    return redirect('/rumah');
}

public function show($id)
{
    $rumah = Rumah::find($id);
    return view('rumah.detail', compact('rumah'));
}


public function home()
{
    $rumah = Rumah::all(); // ambil semua data dari database
    return view('index', compact('rumah'));
}


public function detailUser($id)
{
    $rumah = Rumah::find($id);
    return view('detail', compact('rumah'));
}
}