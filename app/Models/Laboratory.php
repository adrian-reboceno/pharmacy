<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Traits\HasRoles;

class Laboratory extends Model
{
    //
    protected $fillable = [
        'name',        
        'address',        
        'status_id',
    ];
    // Relación con el estado
    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
