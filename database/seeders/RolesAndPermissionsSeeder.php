<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // Create permissions
        $permissions = [
            'create roles and permissions',
            'read roles and permissions',
            'update roles and permissions',
            'delete roles and permissions',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        // Create roles and assign created permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $land_lord = Role::firstOrCreate(['name' => 'land_lord']);
        $tenant = Role::firstOrCreate(['name' => 'tenant']);
        // Create Admin User
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'address' => 'null',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole($adminRole);
        // Create Staff User
        $land = User::firstOrCreate([
            'email' => 'landlord@example.com',
        ], [
            'name' => 'landlord',
            'address' => 'null',
            'password' => Hash::make('landlord123'),
        ]);
        $land->assignRole($land_lord);
        // Create Regular User
        $ten = User::firstOrCreate([
            'email' => 'user@example.com',
        ], [
            'name' => 'User ',
            'address' => 'null',
            'password' => Hash::make('user123'),
        ]);
        $ten->assignRole($tenant);
        // Assign permissions to roles
        $adminRole->givePermissionTo($adminRole);
        $land_lord->givePermissionTo($land_lord);
        $tenant->givePermissionTo($tenant);
    }
}
