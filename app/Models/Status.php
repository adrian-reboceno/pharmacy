<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $fillable = [
        'status_name',
        'description',
        'status_color',
    ];
}
