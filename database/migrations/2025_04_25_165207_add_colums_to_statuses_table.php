<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('statuses', function (Blueprint $table) {
            //
            // Add the new columns to the statuses table           
            $table->enum('exclusive', ['system', 'product'])->default('system')->after('status_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statuses', function (Blueprint $table) {
            //
            // Drop the new columns from the statuses table
            $table->dropColumn('exclusive');
        });
    }
};
