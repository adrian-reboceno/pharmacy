<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    //
    // Define the table associated with the model
    protected $fillable = [
        'symptom_name',
    ];
}
