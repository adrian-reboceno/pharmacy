<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisionSaleTypeSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create permissions for SaleType
        $permissions = [
            'saletype-list',
            'saletype-create',                       
            'saletype-show',
            'saletype-edit',
            'saletype-delete',           
        ];
        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
