<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $fillable = ['nama', 'jenis_kelamin', 'tanggal_lahir', 'email', 'password'];
}
