<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktaPendaftaranPMB extends Model
{
    use HasFactory;

    protected $table = 'fakta_pendaftaran_p_m_b_s';
    protected $primaryKey = 'id_fakta'; // ⬅️ WAJIB: biar Laravel ngerti PK kamu ini
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_waktu',
        'id_lokasi',
        'id_jalur_masuk',
        'id_calon_mahasiswa',
        'id_program_studi',
        'status_bayar',
        'status_seleksi',
        'jumlah_bayar',
    ];

    public function waktu()
    {
        return $this->belongsTo(DimWaktu::class, 'id_waktu', 'id_waktu');
    }

    public function lokasi()
    {
        return $this->belongsTo(DimLokasi::class, 'id_lokasi', 'id_lokasi');
    }

    public function jalurMasuk()
    {
        return $this->belongsTo(DimJalurMasuk::class, 'id_jalur_masuk', 'id_jalur_masuk');
    }    

    public function calonMahasiswa()
    {
        return $this->belongsTo(DimCalonMahasiswa::class, 'id_calon_mahasiswa', 'id_calon_mahasiswa');
    }

    public function programStudi()
{
    return $this->belongsTo(DimProgramStudi::class, 'id_program_studi', 'id_program_studi');
}

}
