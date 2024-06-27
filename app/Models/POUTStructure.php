<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POUTStructure extends Model
{
    use HasFactory;

    protected $table = 'pout_structures';
    protected $fillable = ['role', 'name', 'photo', 'major', 'batch'];
    
}


