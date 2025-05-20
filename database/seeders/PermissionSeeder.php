<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'read-dashboard',
                'guard_name' => 'web',
                'group' => 'Manajemen Dashboard',
                'display_name' => 'Lihat Data',
            ],
            [
                'name' => 'create-users',
                'guard_name' => 'web',
                'group' => 'Manajemen Pengguna',
                'display_name' => 'Tambah Data',
            ],
            [
                'name' => 'read-users',
                'guard_name' => 'web',
                'group' => 'Manajemen Pengguna',
                'display_name' => 'Lihat Data',
            ],
            [
                'name' => 'edit-users',
                'guard_name' => 'web',
                'group' => 'Manajemen Pengguna',
                'display_name' => 'Edit Data',
            ],
            [
                'name' => 'delete-users',
                'guard_name' => 'web',
                'group' => 'Manajemen Pengguna',
                'display_name' => 'Hapus Data',
            ],
            [
                'name' => 'create-roles',
                'guard_name' => 'web',
                'group' => 'Manajemen Jabatan',
                'display_name' => 'Tambah Data',
            ],
            [
                'name' => 'read-roles',
                'guard_name' => 'web',
                'group' => 'Manajemen Jabatan',
                'display_name' => 'Lihat Data',
            ],
            [
                'name' => 'edit-roles',
                'guard_name' => 'web',
                'group' => 'Manajemen Jabatan',
                'display_name' => 'Edit Data',
            ],
            [
                'name' => 'delete-roles',
                'guard_name' => 'web',
                'group' => 'Manajemen Jabatan',
                'display_name' => 'Hapus Data',
            ],
        ];

        foreach ($permissions as $value) {
            $data = Permission::create([
                'name' => $value['name'],
                'guard_name' => $value['guard_name'],
                'group' => $value['group'],
                'display_name' => $value['display_name'],
            ]);

            $role = Role::where('id', 1)->first();

            $role->givePermissionTo($data->id);
        }

        $this->command->info('Seeding Permissions has been completed!');
    }
}
