<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{
    use HasFactory;
    protected $table = 'birthdays'; 

    protected $fillable = [
        'name', 'jurusan', 'angkatan', 'tanggal_lahir'
    ];
}
