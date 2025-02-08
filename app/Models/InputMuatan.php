<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputMuatan extends Model
{
    use HasFactory;

    protected $table = 'inputmuatan'; // Nama tabel

    protected $fillable = [
        'nama_kapal',
        'trip',
        'tanggal',
        'penumpang_dewasa',
        'penumpang_lansia',
        'penumpang_anak',
        'penumpang_bayi',
        'golongan_1',
        'golongan_2',
        'golongan_3',
        'golongan_4_penumpang',
        'golongan_4_barang',
        'golongan_5_penumpang',
        'golongan_5_barang',
        'golongan_6_penumpang',
        'golongan_6_barang',
        'golongan_7',
        'golongan_8',
        'golongan_9',
        'jumlah',
    ];
}
