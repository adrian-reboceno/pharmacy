<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained();
            $table->foreignIdFor(Supplier::class)->constrained();
            $table->foreignIdFor(Status::class)->constrained();
            $table->string('batch_number_internal')->unique();
            $table->string('batch_number_manufacturer')->unique();
            $table->date('expiration_date')->nullable(true);
            $table->integer('quantity');
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->decimal('sale_blister', 10, 2);
            $table->decimal('sale_piece', 10, 2);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
