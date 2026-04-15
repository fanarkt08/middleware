<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Rôle admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Permission
        $permission = Permission::firstOrCreate(['name' => 'view dashboard']);

        // Associer permission au rôle
        $adminRole->givePermissionTo($permission);

        // Créer un admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Assigner le rôle admin
        $admin->assignRole($adminRole);
    }
}