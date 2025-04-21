<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisionSymptomSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create permissions for the symptoms
        $permissions = [
            'symptom-list',
            'symptom-create',
            'symptom-edit',
            'symptom-show',
            'symptom-delete',
        ];
        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
