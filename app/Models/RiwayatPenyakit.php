<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    protected $table = 'riwayat_penyakit';
    protected $primaryKey = 'penyakit_id';
    public $timestamps = false;

    protected $fillable = [
        'masyarakat_id',
        'nama_penyakit',
        'tahun',
        'status',
        'catatan',
    ];

    // Relasi ke tabel masyarakat
    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'masyarakat_id');
    }
}
