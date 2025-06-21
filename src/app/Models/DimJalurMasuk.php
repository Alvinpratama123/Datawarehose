<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimJalurMasuk extends Model
{
    use HasFactory;

    protected $table = 'dim_jalur_masuks';
    protected $primaryKey = 'id_jalur_masuk';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_jalur',
    ];
}
