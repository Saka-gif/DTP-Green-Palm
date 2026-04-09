<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;

class RumahController extends Controller
{
    public function index()
    {
        $data = Rumah::all();
        return view('rumah.index', compact('data'));
    }

    public function create()
{
    return view('rumah.create');
}

public function store(Request $request)
{
    Rumah::create($request->all());
    return redirect('/rumah');
}

public function edit($id)
{
    $rumah = Rumah::find($id);
    return view('rumah.edit', compact('rumah'));
}

public function update(Request $request, $id)
{
    $rumah = Rumah::find($id);
    $rumah->update($request->all());
    return redirect('/rumah');
}

public function destroy($id)
{
    $rumah = Rumah::find($id);
    $rumah->delete();
    return redirect('/rumah');
}
}