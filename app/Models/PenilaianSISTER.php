<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenilaianSISTER extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'penilaian_sister'; // Ganti dengan nama tabel yang sesuai

    // Tentukan field yang dapat diisi massal
    protected $fillable = [
        'dosen_id', // Ganti dengan nama field yang sesuai
        'periode_id', // Ganti dengan nama field yang sesuai
        'bidang_pendidikan', // Ganti dengan nama field yang sesuai
        'bidang_penelitian', // Ganti dengan nama field yang sesuai
        'bidang_pengabdian', // Ganti dengan nama field yang sesuai
        'bidang_penunjang', // Ganti dengan nama field yang sesuai
        'total_nilai', // Ganti dengan nama field yang sesuai
        // Tambahkan field lainnya sesuai dengan tabel Anda
    ];

    // Relasi dengan model Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id'); // pastikan kolom foreign key benar
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
