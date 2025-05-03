<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Symptom extends Model
{
    //
    // Define the table associated with the model
    protected $fillable = [
        'symptom_name',
    ];
    // Define the relationship with the Product model
    // A symptom can be associated with many products
    // and a product can be associated with many symptoms
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    // Define the relationship with the ProductSymptom model
    // A symptom can have many product symptoms
    public function productSymptoms()
    {
        return $this->hasMany(ProductSymptom::class);
    }   
}
