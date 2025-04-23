<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Country;
use App\Models\State;
use App\Models\Status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Country::class)->constrained();
            $table->foreignIdFor(State::class)->constrained();   
            $table->foreignIdFor(Status::class)->constrained();   
            $table->string('name')->nullable(false);
            $table->string('address')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('zip')->nullable(true);
            $table->string('phone')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('website')->nullable(true);
            $table->string('contact_person')->nullable(false);
            $table->string('contact_phone')->nullable(false);
            $table->string('contact_email')->nullable(false);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
