<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganKesehatan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan_kesehatan';
    protected $primaryKey = 'kunjungan_id';

    protected $fillable = [
        'masyarakat_id',
        'tanggal_kunjungan',
        'keluhan',
        'diagnosa',
        'tindakan',
        'user_id',
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'kunjungan_id' => 'integer',
        'masyarakat_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'masyarakat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
