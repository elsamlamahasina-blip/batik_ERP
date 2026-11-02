<?php

namespace App\Services;

use App\Models\User;

class RoleNavigationService
{
    /**
     * Role route mapping for SiBatik ERP.
     *
     * @var array<string, string>
     */
    protected array $roleRoutes = [
        'admin' => 'dashboard.admin',
        'pembelian' => 'dashboard.pembelian',
        'gudang' => 'dashboard.gudang',
        'penjualan' => 'dashboard.penjualan',
        'kasir' => 'dashboard.kasir',
        'keuangan' => 'dashboard.keuangan',
        'eksekutif' => 'dashboard.eksekutif',
    ];

    /**
     * Get the redirect route name based on the user's assigned role.
     */
    public function getDashboardRouteForUser(User $user): string
    {
        foreach ($this->roleRoutes as $role => $routeName) {
            if ($user->hasRole($role)) {
                return $routeName;
            }
        }

        return 'dashboard.default';
    }

    /**
     * Get list of all supported role identifiers.
     *
     * @return array<int, string>
     */
    public function getSupportedRoles(): array
    {
        return array_keys($this->roleRoutes);
    }
}

