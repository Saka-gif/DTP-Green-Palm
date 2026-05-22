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
        'foto_public_id',
        'denah',
        'denah_public_id',
        'tipe_id',
        'luas_tanah',
        'luas_bangunan',
        'kamar_tidur',
        'kamar_mandi',
        'lantai',
        'carport',
    ];


public function getFotoUrlAttribute(): ?string
{
    return $this->resolveMediaUrl($this->foto);
}

public function getDenahUrlAttribute(): ?string
{
    return $this->resolveMediaUrl($this->denah);
}

public function isTersedia(): bool
{
    return strtolower(trim((string) $this->status)) === 'tersedia';
}

public function getStatusLabelAttribute(): string
{
    $status = trim((string) $this->status);

    return $status !== '' ? $status : '-';
}

private function resolveMediaUrl(?string $value): ?string
{
    if (! $value) {
        return null;
    }

    if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
        return $value;
    }

    return asset('images/' . $value);
}


public function tipe()
{
    return $this->belongsTo(TipeRumah::class, 'tipe_id');
}
}