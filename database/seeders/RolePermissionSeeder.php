<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        // Check if the role already exists
        $admin = Role::where('name', 'admin')->where('guard_name', 'web')->first();
        $customer = Role::where('name', 'customer')->where('guard_name', 'web')->first();
        if (!$admin) {
            Role::create(['name' => 'admin', 'guard_name' => 'web']);
        }
        if (!$customer) {
            Role::create(['name' => 'customer', 'guard_name' => 'web']);
        }
    }
}
