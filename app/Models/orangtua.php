<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $table = 'orang_tua';
    protected $primaryKey = 'id_orangtua';
    protected $fillable = [
        'nama_orangtua',
        'nik',
        'usia_orangtua',
        'jenis_kelamin_orangtua',
        'pekerjaan',
        'alamat',
        'riwayat_penyakit',
        'jenis_penyakit'
    ];

    public function anak()
    {
        return $this->hasMany(Anak::class, 'id_orangtua');
    }
}
