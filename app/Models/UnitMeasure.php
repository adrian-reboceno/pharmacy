<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitMeasure extends Model
{
    //
    // Define the table associated with the model
    protected $fillable = [
        'name',
        'abbreviation',
        'status_id'
    ];
}
