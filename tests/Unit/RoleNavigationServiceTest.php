<?php

use App\Models\User;
use App\Services\RoleNavigationService;
use Database\Seeders\RoleAndUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RoleAndUserSeeder::class);
    $this->service = new RoleNavigationService();
});

test('service returns correct dashboard route for each role', function () {
    $expected = [
        'admin@sibatik.lan' => 'dashboard.admin',
        'pembelian@sibatik.lan' => 'dashboard.pembelian',
        'gudang@sibatik.lan' => 'dashboard.gudang',
        'penjualan@sibatik.lan' => 'dashboard.penjualan',
        'kasir@sibatik.lan' => 'dashboard.kasir',
        'keuangan@sibatik.lan' => 'dashboard.keuangan',
        'eksekutif@sibatik.lan' => 'dashboard.eksekutif',
    ];

    foreach ($expected as $email => $routeName) {
        $user = User::where('email', $email)->first();
        expect($this->service->getDashboardRouteForUser($user))->toBe($routeName);
    }
});

test('service returns default dashboard when user has no role', function () {
    $user = User::factory()->create();
    expect($this->service->getDashboardRouteForUser($user))->toBe('dashboard.default');
});

test('service registers exactly 7 supported roles', function () {
    $roles = $this->service->getSupportedRoles();

    expect($roles)->toHaveCount(7)
        ->toContain('admin', 'pembelian', 'gudang', 'penjualan', 'kasir', 'keuangan', 'eksekutif');
});
