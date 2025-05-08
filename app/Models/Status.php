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
        'exclusive',
    ];
    protected $casts = [
        'status_color' => 'string',
        'exclusive' => 'boolean',
    ];
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function denominations()
    {
        return $this->hasMany(Denomination::class);
    }
    public function laboratories()
    {
        return $this->hasMany(Laboratory::class);
    }
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    
}
