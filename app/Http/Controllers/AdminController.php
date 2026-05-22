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

        $tersedia = $rumah->filter(fn (Rumah $item) => $item->isTersedia())->count();

        $stats = [
            'totalRumah' => $rumah->count(),
            'totalTipe' => $tipeRumah->count(),
            'tersedia' => $tersedia,
            'lainnya' => $rumah->count() - $tersedia,
        ];

        return view('admin.dashboard', compact('rumah', 'tipeRumah', 'stats'));
    }
}
