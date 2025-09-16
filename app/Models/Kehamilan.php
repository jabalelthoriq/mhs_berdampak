<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehamilan extends Model
{
    use HasFactory;

    protected $table = 'kehamilan';
    protected $primaryKey = 'kehamilan_id';
    public $timestamps = false;

    protected $fillable = [
        'masyarakat_id',
        'hpl',
        'usia_kehamilan',
        'catatan',
    ];

    protected $casts = [
        'hpl' => 'date',
        'kehamilan_id' => 'integer',
        'masyarakat_id' => 'integer',
        'usia_kehamilan' => 'integer',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'masyarakat_id');
    }
}
