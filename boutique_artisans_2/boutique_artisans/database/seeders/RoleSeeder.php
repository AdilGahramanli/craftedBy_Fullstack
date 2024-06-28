<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
                $artisan = Role::create(['name' => 'artisan']);
                $user = Role::create(['name' => 'user']);

                Permission::create(['name' => 'manage products']);
                Permission::create(['name' => 'view products']);

                $admin->givePermissionTo('manage products');
                $artisan->givePermissionTo('manage products');
                $user->givePermissionTo('view products');
    }
}
