<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Define the table associated with the model
    protected $fillable = [
        'name_es',
        'name_en',
        'iso2',
        'iso3',
        'phone_code',
    ];
}
