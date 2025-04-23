<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UnitMeasure;

class UnitMeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UnitMeasure::create(['name' => 'Unidad', 'abbreviation' => 'Und', 'status_id' => 1]);       
        UnitMeasure::create(['name' => 'Mililitro', 'abbreviation' => 'Ml', 'status_id' => 1]);    
        UnitMeasure::create(['name' => 'Gramo', 'abbreviation' => 'Gr', 'status_id' => 1]);
        UnitMeasure::create(['name' => 'Miligramo', 'abbreviation' => 'Mg', 'status_id' => 1]);
        UnitMeasure::create(['name' => 'Litro', 'abbreviation' => 'Lt', 'status_id' => 1]);        
        UnitMeasure::create(['name' => 'Pieza', 'abbreviation' => 'Pz', 'status_id' => 1]);
    }
}
