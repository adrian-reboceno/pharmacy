<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisionSuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create the permissions
        $permissions = [
            'supplier-show',
            'supplier-create',
            'supplier-edit',
            'supplier-delete',
            'supplier-list',
        ];
        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
