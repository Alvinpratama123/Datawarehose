<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'dim_program_studis';
    protected $primaryKey = 'id_program_studi';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_prodi',
        'jenjang_pendidikan',
        'fakultas',
    ];
}
