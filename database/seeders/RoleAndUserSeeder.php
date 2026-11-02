<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds for Pekan 1 roles and default users.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            'admin' => 'Administrator Sistem',
            'pembelian' => 'Staff Pengadaan / Pembelian',
            'gudang' => 'Staff / Pengelola Gudang Batik',
            'penjualan' => 'Staff / Manajer Penjualan',
            'kasir' => 'Kasir Point of Sale (POS)',
            'keuangan' => 'Staff / Akuntan Keuangan',
            'eksekutif' => 'Direktur / Pemilik UMKM Batik',
        ];

        foreach (array_keys($roles) as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        $users = [
            [
                'name' => 'Admin SiBatik (Gmail)',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin SiBatik',
                'email' => 'admin@sibatik.lan',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Staff Pembelian',
                'email' => 'pembelian@sibatik.lan',
                'password' => Hash::make('password'),
                'role' => 'pembelian',
            ],
            [
                'name' => 'Kepala Gudang Batik',
                'email' => 'gudang@sibatik.lan',
                'password' => Hash::make('password'),
                'role' => 'gudang',
            ],
            [
                'name' => 'Staff Penjualan',
                'email' => 'penjualan@sibatik.lan',
                'password' => Hash::make('password'),
                'role' => 'penjualan',
            ],
            [
                'name' => 'Kasir Batik Utama',
                'email' => 'kasir@sibatik.lan',
                'password' => Hash::make('password'),
                'role' => 'kasir',
            ],
            [
                'name' => 'Staff Keuangan & Faktur',
                'email' => 'keuangan@sibatik.lan',
                'password' => Hash::make('password'),
                'role' => 'keuangan',
            ],
            [
                'name' => 'Pimpinan Eksekutif UMKM',
                'email' => 'eksekutif@sibatik.lan',
                'password' => Hash::make('password'),
                'role' => 'eksekutif',
            ],
        ];

        foreach ($users as $userData) {
            $role = $userData['role'];
            unset($userData['role']);

            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );

            if (! $user->hasRole($role)) {
                $user->assignRole($role);
            }
        }
    }
}

