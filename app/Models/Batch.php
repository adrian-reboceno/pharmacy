<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Batch extends Model
{
    //
    protected $fillable = [
        'product_id',
        'supplier_id',
        'status_id',
        'batch_number_internal',
        'batch_number_manufacturer',
        'expiration_date',
        'quantity',
        'purchase_price',
        'sale_price',
        'sale_blister',
        'sale_piece'
    ];
    protected $casts = [
        'expiration_date' => 'date',
        'purchase_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'sale_blister' => 'decimal:2',
        'sale_piece' => 'decimal:2'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }   
}
