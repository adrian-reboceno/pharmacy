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
            //
            $table->string('paternal_surname')->nullable()->after('name');
            $table->string('maternal_surname')->nullable()->after('paternal_surname');
            $table->string('phone_numbrer')->nullable()->after(('email'));
            $table->string('address')->nullable()->after('phone_numbrer');
            $table->string('address_number')->nullable()->after('address');
            $table->string('address_complement')->nullable()->after('address_number');
            $table->string('neighborhood')->nullable()->after('address_complement');
            $table->string('address_reference')->nullable()->after('neighborhood');            
            $table->string('city')->nullable()->after('address_reference');
            $table->string('state')->nullable()->after('city');
            $table->string('country')->nullable()->after('state');
            $table->string('postal_code')->nullable()->after('country');
            $table->string('avatar')->nullable()->after('postal_code');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('paternal_name');
            $table->dropColumn('maternal_name');
            $table->dropColumn('phone_numbrer');
            $table->dropColumn('address');
            $table->dropColumn('address_number');
            $table->dropColumn('address_complement');
            $table->dropColumn('neighborhood');
            $table->dropColumn('address_reference');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('country');
            $table->dropColumn('postal_code');
            $table->dropColumn('avatar');
        });
    }
};
