<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
    //
    protected $fillable = [
        'category_id',
        'denomination_id',
        'sale_type_id',
        'pharmaceutical_form_id',
        'laboratory_id',
        'unit_measure_id',
        'status_id',
        'barcode',
        'name',
        'active_principle',
        'description',            
        'utility',
        'quantity',                       
        'stock_min',
        'stock_max',
        'units_blister',            
        'units_box',
        'sanitary_registration',  
        'expiration_date', 
        'sale_piece',                          
    ];
    protected $casts = [
        'expiration_date' => 'boolean',
        'sale_piece' => 'boolean',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function denomination()
    {
        return $this->belongsTo(Denomination::class);
    }
    public function saleType()
    {
        return $this->belongsTo(SaleType::class);
    }
    public function pharmaceuticalForm()
    {
        return $this->belongsTo(PharmaceuticalForm::class);
    }
    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }
    public function UnitMeasure()
    {
        return $this->belongsTo(UnitMeasure::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true);
    }
    
    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class);
    }
    public function productSymptom()
    {
        return $this->hasMany(ProductSymptom::class);
    }
    public function productSymptomById($id)
    {
        return $this->hasOne(ProductSymptom::class)->where('id', $id);
    }
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
    

}
