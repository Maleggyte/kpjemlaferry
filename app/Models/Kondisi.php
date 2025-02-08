<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kondisi extends Model
{
    use HasFactory;

    protected $table = 'kondisi';
    protected $fillable = ['pilih_pelabuhan', 'nama_kapal', 'tanggal', 'kapal_operasi', 'pola_operasi', 'kendala', 'cuaca_pagi', 'cuaca_siang', 'cuaca_sore', 'cuaca_malam', 'angin_pagi', 'angin_siang', 'angin_sore', 'angin_malam', 'gelombang_pagi', 'gelombang_siang', 'gelombang_sore', 'gelombang_malam', 'lintasan_pagi', 'lintasan_siang', 'lintasan_sore', 'lintasan_malam'];
}
