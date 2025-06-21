<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimCalonMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'dim_calon_mahasiswas';
    protected $primaryKey = 'id_calon_mahasiswa';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'pendidikan_terakhir',
    ];
}
