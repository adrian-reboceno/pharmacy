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
        Schema::table('users', function (Blueprint $table) {
            //add the new columns status to the users table
            $table->foreignId('status_id')->nullable()->constrained('statuses')->after('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            // Drop the foreign key constraint
            $table->dropForeign(['status_id']);
            // Drop the status_id column
            $table->dropColumn('status_id');
        });
    }
};
