<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    //
    protected $fillable = [
        'category_name',
        'description',
        'parent_id',
    ];
    // Categoría padre
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Relación con las subcategorías
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
