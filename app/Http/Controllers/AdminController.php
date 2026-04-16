<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\TipeRumah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $rumah = Rumah::with('tipe')->orderBy('created_at', 'desc')->get();
        $tipeRumah = TipeRumah::orderBy('created_at', 'desc')->get();

        $stats = [
            'totalRumah' => $rumah->count(),
            'totalTipe' => $tipeRumah->count(),
            'tersedia' => $rumah->where('status', 'Tersedia')->count(),
            'lainnya' => $rumah->where('status', '!=', 'Tersedia')->count(),
        ];

        return view('admin.dashboard', compact('rumah', 'tipeRumah', 'stats'));
    }
}
