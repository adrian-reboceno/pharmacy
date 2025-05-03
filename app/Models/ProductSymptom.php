<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSymptom extends Model
{
    //
    // Define the table associated with the model
    protected $table = 'product_symptom';   
    protected $fillable = [
        'product_id',
        'symptom_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }
    public function symptoms()
    {
        return $this->hasMany(Symptom::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function symptomName()
    {
        return $this->hasOne(Symptom::class, 'id', 'symptom_id');
    }
    public function productName()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
