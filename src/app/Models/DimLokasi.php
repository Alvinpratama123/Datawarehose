<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimLokasi extends Model
{
    use HasFactory;

    protected $table = 'dim_lokasis';
    protected $primaryKey = 'id_lokasi';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'provinsi',
        'kota_kabupaten',
    ];
}
