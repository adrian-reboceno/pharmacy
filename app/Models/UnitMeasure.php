<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class UnitMeasure extends Model
{
    //
    // Define the table associated with the model
    protected $fillable = [
        'name',
        'abbreviation',
        'status_id'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
