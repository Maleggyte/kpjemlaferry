<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Input extends Model
{
    use HasFactory;
    protected $table = 'input';
    protected $fillable = ['pelabuhan', 'kapal', 'tanggal_keberangkatan', 'jam_keberangkatan', 'trip', 'jumlah_trip', 'dermaga', 'keterangan'];
    //
}