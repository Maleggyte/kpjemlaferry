<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akunsaya extends Model
{
    protected $table = 'akunsaya';
    protected $fillable = ['nama', 'email', 'password'];
}
