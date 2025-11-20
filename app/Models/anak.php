<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anak';
    protected $primaryKey = 'id_anak';

    protected $fillable = [
        'nik',
        'nama_ortu',
        'nama_anak',
        'tanggal_lahir',
        'usia_anak',
        'jenis_kelamin_anak',

        // Status Imunisasi
        'imunisasi_hepatitis_b',
        'imunisasi_bcg',
        'imunisasi_polio',
        'imunisasi_dpt_hb_hib',
        'imunisasi_pcv',
        'imunisasi_rota',
        'imunisasi_campak_rubella',

        // Tanggal Imunisasi
        'tanggal_hepatitis_b',
        'tanggal_bcg',
        'tanggal_polio',
        'tanggal_dpt_hb_hib',
        'tanggal_pcv',
        'tanggal_rota',
        'tanggal_campak_rubella',

        // Data Fisik
        'tinggi_badan',
        'berat_badan',

        // Status Gizi
        'kesimpulan',

        'nama_petugas'
    ];

    public function pelayanan()
    {
        return $this->hasMany(Pelayanan::class, 'id_anak');
    }
}
