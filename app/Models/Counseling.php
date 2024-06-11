<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counseling extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_name', 'topic'];

    // Specify the table name
    protected $table = 'counseling_topics';

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
