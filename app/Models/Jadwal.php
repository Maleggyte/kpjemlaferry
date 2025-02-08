<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $fillable = [ 'pilih_pelabuhan', 'nama_kapal', 'tanggal_keberangkatan', 'jam_sandar', 'jam_keberangkatan', 'dermaga'];
}
