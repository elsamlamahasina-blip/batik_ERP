<?php

namespace App\Http\Controllers;

use App\Services\RoleNavigationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleDashboardController extends Controller
{
    public function __construct(
        protected RoleNavigationService $navigationService
    ) {}

    /**
     * Redirect authenticated user to their role-specific dashboard.
     */
    public function redirect(Request $request): RedirectResponse|View
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        $routeName = $this->navigationService->getDashboardRouteForUser($user);

        if ($routeName === 'dashboard.default') {
            return view('dashboard', [
                'roleName' => 'Pengguna',
                'roleTitle' => 'Dashboard Umum',
            ]);
        }

        return redirect()->route($routeName);
    }

    /**
     * Admin Dashboard.
     */
    public function admin(): View
    {
        return view('dashboards.admin', [
            'roleName' => 'admin',
            'roleTitle' => 'Administrator Sistem & Keamanan',
        ]);
    }

    /**
     * Purchasing / Procurement Dashboard.
     */
    public function pembelian(): View
    {
        return view('dashboards.pembelian', [
            'roleName' => 'pembelian',
            'roleTitle' => 'Pengadaan Bahan Baku & Purchase Order',
        ]);
    }

    /**
     * Warehouse / Inventory Dashboard.
     */
    public function gudang(): View
    {
        return view('dashboards.gudang', [
            'roleName' => 'gudang',
            'roleTitle' => 'Manajemen Gudang Batik & Mutasi Stok',
        ]);
    }

    /**
     * Sales Dashboard.
     */
    public function penjualan(): View
    {
        return view('dashboards.penjualan', [
            'roleName' => 'penjualan',
            'roleTitle' => 'Penjualan Grosir, Reseller & Sales Order',
        ]);
    }

    /**
     * Point of Sale (POS) Cashier Dashboard.
     */
    public function kasir(): View
    {
        return view('dashboards.kasir', [
            'roleName' => 'kasir',
            'roleTitle' => 'Kasir Toko Batik (Point of Sale)',
        ]);
    }

    /**
     * Finance & Invoicing Dashboard.
     */
    public function keuangan(): View
    {
        return view('dashboards.keuangan', [
            'roleName' => 'keuangan',
            'roleTitle' => 'Akuntansi, Faktur & Pelunasan',
        ]);
    }

    /**
     * Executive EIS Dashboard.
     */
    public function eksekutif(): View
    {
        return view('dashboards.eksekutif', [
            'roleName' => 'eksekutif',
            'roleTitle' => 'Executive Information System (EIS) Pemilik UMKM',
        ]);
    }
}
