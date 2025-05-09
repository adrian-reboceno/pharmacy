<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Batch;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Status;
use App\Helpers\PriceHelper;
class BatchForm extends Component
{
    public $batch;
    public $products;
    public $selectProduct=0;
    public $product;
    public $suppliers;  
    public $supplier;
    public $selectSupplier=0;
    public $selectStatus=0;
    public $statuses;
    public $status;
    public $product_id;
    public $supplier_id;
    public $status_id;
    public $batch_number_internal;
    public $batch_number_manufacturer;
    public $expiration_date;
    public $quantity;
    public $purchase_price;
    public $sale_price;
    public $sale_blister;
    public $sale_piece;
    public $utility;
    
    public function updatedSelectProduct($product)
    {
       /*  dd($product); */
        $this->product_id = $product;
        $this->product = Product::find($product);
        if ($this->product) {
            $this->utility = $this->product->utility;
        }       
    }
    public function updatedPurchasePrice($purchasePrice)
    {
        if ($this->product) {
            $this->sale_price = PriceHelper::salePrice($purchasePrice, $this->product->utility);
            $this->sale_piece = PriceHelper::unitSalePrice($purchasePrice, $this->product->units_box, $this->product->utility);
            $this->sale_blister = PriceHelper::blisterSalePrice($purchasePrice, $this->product->units_box, $this->product->units_blister , $this->product->utility);
        }
    }
    
    public function mount($batch = null)
    {       
        $this->products = Product::all();
        $this->suppliers = Supplier::all();
        $this->statuses = Status::where('exclusive', 'batch')->get();
    }
    public function render()
    {
        return view('livewire.batch-form');
    }   
}
