<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $client = Role::create(['name' => 'Client']);

        Permission::create(['name'=>'categories.index']);
        Permission::create(['name'=>'categories.store']);
        Permission::create(['name'=>'categories.create']);
        Permission::create(['name'=>'categories.destroy']);
        Permission::create(['name'=>'categories.update']);
        Permission::create(['name'=>'categories.edit']);
        Permission::create(['name'=>'dashboard']);
        Permission::create(['name'=>'posts.index']);
        Permission::create(['name'=>'posts.store']);
        Permission::create(['name'=>'posts.create']);
        Permission::create(['name'=>'posts.update']);
        Permission::create(['name'=>'posts.destroy']);
        Permission::create(['name'=>'posts.edit']);


        $admin->givePermissionTo([
            'categories.index',
            'categories.store',
            'categories.create',
            'categories.destroy',
            'categories.update',
            'categories.edit',
            'dashboard',
            'posts.index',
            'posts.store',
            'posts.create',
            'posts.update',
            'posts.destroy',
            'posts.edit',
        ]);

        $client->givePermissionTo([
            'dashboard',
            'posts.index',
            'posts.store',
            'posts.create',
            'posts.update',
            'posts.destroy',
            'posts.edit',
        ]);

        User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('password'),
        ])->assignRole('Admin');
    }
    
}
