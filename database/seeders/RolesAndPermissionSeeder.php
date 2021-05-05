<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $tables = [
            'roles',
            'permissions',
            'model_has_roles',
            'model_has_permissions'
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $timestamp = ['created_at' => now(), 'updated_at' => now()];

        Permission::insert([
            array_merge(['name' => 'contact read'], $timestamp),
            array_merge(['name' => 'contact create'], $timestamp),
            array_merge(['name' => 'contact update'], $timestamp),
            array_merge(['name' => 'contact delete'], $timestamp),
            array_merge(['name' => 'contact assign'], $timestamp),
            array_merge(['name' => 'contact follow up'], $timestamp),
            array_merge(['name' => 'contact history'], $timestamp),
            array_merge(['name' => 'contact update status'], $timestamp)
        ]);

        Role::create([
            'name' => 'administrator'
        ])
        ->givePermissionTo([
            'contact read', 'contact create', 'contact update', 'contact delete', 'contact assign'
        ]);

        Role::create([
            'name' => 'agent'
        ])
        ->givePermissionTo([
            'contact follow up', 'contact update status', 'contact history'
        ]);

        Model::reguard();
    }
}
