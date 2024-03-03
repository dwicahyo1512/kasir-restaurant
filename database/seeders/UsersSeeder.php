<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed admin
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin_user',
            'gender' => 'Male',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
        $admin->syncRoles('super-admin');

        // Seed waiter
        $waiter = User::create([
            'name' => 'Waiter',
            'username' => 'waiter_user',
            'gender' => 'Male',
            'email' => 'waiter@waiter.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
        $waiter->syncRoles('waiter');

        // Seed owner
        $owner = User::create([
            'name' => 'Owner',
            'username' => 'owner_user',
            'gender' => 'Male',
            'email' => 'owner@owner.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
        $owner->syncRoles('owner');

        // Seed kasir
        $kasir = User::create([
            'name' => 'Kasir',
            'username' => 'kasir_user',
            'gender' => 'Male',
            'email' => 'kasir@kasir.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
        $kasir->syncRoles('kasir');
    }
}
