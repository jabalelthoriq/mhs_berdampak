<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imunisasi';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'imunisasi_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'masyarakat_id',
        'jenis_imunisasi',
        'tanggal_imunisasi',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_imunisasi' => 'date',
        'imunisasi_id' => 'integer',
        'masyarakat_id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * Get the masyarakat that owns the imunisasi.
     */
    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'masyarakat_id');
    }

    /**
     * Get the user that created the imunisasi record.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Scope a query to only include imunisasi for a specific masyarakat.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $masyarakatId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForMasyarakat($query, $masyarakatId)
    {
        return $query->where('masyarakat_id', $masyarakatId);
    }

    /**
     * Scope a query to only include imunisasi by jenis.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $jenis
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByJenis($query, $jenis)
    {
        return $query->where('jenis_imunisasi', $jenis);
    }

    /**
     * Scope a query to only include imunisasi within date range.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $startDate
     * @param  string  $endDate
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('tanggal_imunisasi', [$startDate, $endDate]);
    }
}
