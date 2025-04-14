<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisionSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'status-list',
            'status-create',
            'status-edit',
            'status-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',            
        ];
        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
