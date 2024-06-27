<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdpjMember extends Model
{
    protected $table = 'servants'; // Sesuaikan dengan nama tabel yang sebenarnya

    protected $fillable = ['name', 'major', 'batch', 'role']; // Kolom yang dapat diisi secara massal

}
