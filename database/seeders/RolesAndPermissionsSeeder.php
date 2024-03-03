<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create permissions
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'read permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'read roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'create kasir']);
        Permission::create(['name' => 'read kasir']);
        Permission::create(['name' => 'update kasir']);
        Permission::create(['name' => 'delete kasir']);

        Permission::create(['name' => 'create proses']);
        Permission::create(['name' => 'read proses']);
        Permission::create(['name' => 'update proses']);
        Permission::create(['name' => 'delete proses']);

        Permission::create(['name' => 'create history']);
        Permission::create(['name' => 'read history']);
        Permission::create(['name' => 'update history']);
        Permission::create(['name' => 'delete history']);

        Permission::create(['name' => 'create kategori']);
        Permission::create(['name' => 'read kategori']);
        Permission::create(['name' => 'update kategori']);
        Permission::create(['name' => 'delete kategori']);

        Permission::create(['name' => 'create meja']);
        Permission::create(['name' => 'read meja']);
        Permission::create(['name' => 'update meja']);
        Permission::create(['name' => 'delete meja']);

        Permission::create(['name' => 'create menu']);
        Permission::create(['name' => 'read menu']);
        Permission::create(['name' => 'update menu']);
        Permission::create(['name' => 'delete menu']);

        Permission::create(['name' => 'create discount']);
        Permission::create(['name' => 'read discount']);
        Permission::create(['name' => 'update discount']);
        Permission::create(['name' => 'delete discount']);

        Permission::create(['name' => 'read dashboard']);

        Permission::create(['name' => 'label controller']);
        Permission::create(['name' => 'label kasir']);
        Permission::create(['name' => 'label admin']);
        Permission::create(['name' => 'label dashboard']);

        Permission::create(['name' => 'update settings']);


        // create roles and assign created permissions

        // this can be done as separate statements

        $role = Role::create(['name' => 'waiter']);
        $role->givePermissionTo([
            'label kasir',
            'read proses',
            'create proses',
            'update proses',
            'delete proses',
            'create history',
            'read history',
            'update history',
            'delete history'
        ]);

        $role = Role::create(['name' => 'owner']);
        $role->givePermissionTo([
            'label dashboard',
            'read dashboard',
            'label controller',
            'create kategori',
            'read kategori',
            'update kategori',
            'delete kategori',
            'create meja',
            'read meja',
            'update meja',
            'delete meja',
            'create menu',
            'read menu',
            'update menu',
            'delete menu',
            'create discount',
            'read discount',
            'update discount',
            'delete discount'
        ]);

        // or may be done by chaining
        $role = Role::create(['name' => 'kasir'])
            ->givePermissionTo([
                'label kasir',
                'create kasir',
                'read kasir',
                'update kasir',
                'delete kasir'
            ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
