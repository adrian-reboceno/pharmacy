<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Traits\HasRoles;


class State extends Model
{    
    // Define the table associated with the model
    protected $fillable = [
        'code',
        'abbreviation',
        'name',
    ];
    // Define the relationship with the Country model
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
