<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rumah extends Model
{
        use HasFactory;

    protected $table = 'rumah';

    protected $fillable = [
        'nama_rumah',
        'harga',
        'lokasi',
        'status',
        'deskripsi',
        'foto',
        'tipe_id',
        'luas_tanah',
        'luas_bangunan',
        'kamar_tidur',
        'kamar_mandi',
        'lantai',
        'carport',
    ];


public function tipe()
{
    return $this->belongsTo(TipeRumah::class, 'tipe_id');
}
}