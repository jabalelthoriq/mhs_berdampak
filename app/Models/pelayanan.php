<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;

    protected $table = 'pelayanan';
    protected $primaryKey = 'id_pelayanan';
    protected $fillable = [
        'nama_pasien',
        'tanggal_pelayanan',
        'program_kesehatan',
        'created_at',
        'updated_at',
        'jenis_pelayanan'
    ];

}
