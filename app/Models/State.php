<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{    
    // Define the table associated with the model
    protected $fillable = [
        'code',
        'name',
    ];
}
