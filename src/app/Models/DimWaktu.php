<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimWaktu extends Model
{
    use HasFactory;

    protected $table = 'dim_waktus'; // nama tabel
    protected $primaryKey = 'id_waktu'; // sesuai migration
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'tanggal',
        'hari',
        'bulan',
        'tahun',
        'periode_pendaftaran',
    ];
}
