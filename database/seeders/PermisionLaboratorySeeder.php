<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisionLaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'laboratory-list',
            'laboratory-create',
            'laboratory-edit',
            'laboratory-delete',
            'laboratory-show',          
        ];
        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }      
    }
}
