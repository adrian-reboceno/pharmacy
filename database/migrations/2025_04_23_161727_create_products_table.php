<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Denomination;
use App\Models\SaleType;
use App\Models\PharmaceuticalForm;
use App\Models\Laboratory;
use App\Models\UnitMeasure;
use App\Models\Status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->constrained();
            $table->foreignIdFor(Denomination::class)->constrained();
            $table->foreignIdFor(SaleType::class)->constrained();
            $table->foreignIdFor(PharmaceuticalForm::class)->constrained();
            $table->foreignIdFor(Laboratory::class)->constrained();
            $table->foreignIdFor(UnitMeasure::class)->constrained();
            $table->foreignIdFor(Status::class)->constrained();
            $table->string('barcode')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('active_principle')->nullable(false);
            $table->string('description')->nullable(false);            
            $table->decimal('utility', total:10, places:2)->nullable(false);
            $table->string('quantity')->nullable(false);                       
            $table->integer('stock_min')->nullable(false);
            $table->integer('stock_max')->nullable(false);
            $table->integer('units_blister')->nullable(false);            
            $table->integer('units_box')->nullable(false);
            $table->string('sanitary_registration')->nullable(false);  
            $table->boolean('expiration_date')->nullable(false)->default(false);; 
            $table->boolean('sale_piece')->nullable(false)->default(false);;                          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
