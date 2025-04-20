<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisionPharmaceuticalFormssedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create permissions for the pharmaceutical forms
        $permissions = [
            'pharmaceuticalform-list',
            'pharmaceuticalform-create',
            'pharmaceuticalform-edit',
            'pharmaceuticalform-show',
            'pharmaceuticalform-delete',
        ];
        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
