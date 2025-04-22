<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisionShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create the permissions
        $permissions = [
            'role-show',
            'user-show',
            'status-show',            
            'category-show',
            'denomination-show',
            'denomination-create',
            'denomination-edit',
            'denomination-delete',
            'denomination-list',
            'permission-show',
        ];
        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
