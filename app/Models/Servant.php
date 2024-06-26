<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servant extends Model
{
    use HasFactory;
    protected $table = 'servants';

    protected $fillable = [
        'name',
        'major',
        'batch',
        'role',
        'photo',
        'serving_as',
    ];
}
