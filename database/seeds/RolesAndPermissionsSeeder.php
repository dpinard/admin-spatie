<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create post']);
        Permission::create(['name' => 'read posts']);
        Permission::create(['name' => 'update posts']);
        Permission::create(['name' => 'delete post']);
        
        Permission::create(['name' => 'upgrade admin']);

        $role1 = Role::create(['name' => 'user'])   
                        ->givePermissionTo('create post');

        
        $role2 = Role::create(['name' => 'admin'])
                        ->givePermissionTo(['create post', 'upgrade admin']);

        $role3 = Role::create(['name' => 'super-admin'])
                        ->givePermissionTo(Permission::all());


        $user = User::create([
            'name' => 'test0',
            'email' => 'test0@test0.com',
            'password' => bcrypt('1234'),
            'active' => 0,
        ]);
        $user->assignRole($role1, $role2, $role3);

    }
}
