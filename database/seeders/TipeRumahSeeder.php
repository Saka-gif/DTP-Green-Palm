<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipeRumah;

class TipeRumahSeeder extends Seeder
{
    public function run(): void
    {
        TipeRumah::insert([
            [
                'nama_tipe' => 'Type 36',
                'deskripsi' => 'Rumah kecil'
            ],
            [
                'nama_tipe' => 'Type 45',
                'deskripsi' => 'Rumah sedang'
            ],
            [
                'nama_tipe' => 'Type 60',
                'deskripsi' => 'Rumah besar'
            ],
        ]);
    }
}