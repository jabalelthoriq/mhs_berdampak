<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakat';
    protected $primaryKey = 'masyarakat_id';

    protected $fillable = [
        'nik',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'pekerjaan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Relasi ke tabel riwayat_penyakit
    public function riwayatPenyakit()
    {
        return $this->hasMany(RiwayatPenyakit::class, 'masyarakat_id', 'masyarakat_id');
    }
}
