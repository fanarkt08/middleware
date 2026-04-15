<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Créer rôle
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Créer permission
        $permission = Permission::firstOrCreate(['name' => 'view dashboard']);

        // Associer permission au rôle
        $adminRole->givePermissionTo($permission);

        // Récup user
        $user = User::where('email', 'test@example.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}