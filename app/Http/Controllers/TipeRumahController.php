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
}