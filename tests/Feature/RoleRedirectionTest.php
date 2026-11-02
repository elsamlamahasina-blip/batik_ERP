<?php

use App\Models\User;
use Database\Seeders\RoleAndUserSeeder;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    $this->seed(RoleAndUserSeeder::class);
});

test('admin user redirects to admin dashboard', function () {
    $admin = User::where('email', 'admin@sibatik.lan')->first();

    $response = $this->actingAs($admin)->get('/dashboard');

    $response->assertRedirect(route('dashboard.admin'));
    $this->actingAs($admin)->get(route('dashboard.admin'))->assertStatus(200)->assertSee('Administrator');
});

test('pembelian user redirects to pembelian dashboard', function () {
    $pembelian = User::where('email', 'pembelian@sibatik.lan')->first();

    $response = $this->actingAs($pembelian)->get('/dashboard');

    $response->assertRedirect(route('dashboard.pembelian'));
    $this->actingAs($pembelian)->get(route('dashboard.pembelian'))->assertStatus(200)->assertSee('Pengadaan');
});

test('gudang user redirects to gudang dashboard', function () {
    $gudang = User::where('email', 'gudang@sibatik.lan')->first();

    $response = $this->actingAs($gudang)->get('/dashboard');

    $response->assertRedirect(route('dashboard.gudang'));
    $this->actingAs($gudang)->get(route('dashboard.gudang'))->assertStatus(200)->assertSee('Gudang Batik');
});

test('penjualan user redirects to penjualan dashboard', function () {
    $penjualan = User::where('email', 'penjualan@sibatik.lan')->first();

    $response = $this->actingAs($penjualan)->get('/dashboard');

    $response->assertRedirect(route('dashboard.penjualan'));
    $this->actingAs($penjualan)->get(route('dashboard.penjualan'))->assertStatus(200)->assertSee('Penjualan Grosir');
});

test('kasir user redirects to kasir dashboard', function () {
    $kasir = User::where('email', 'kasir@sibatik.lan')->first();

    $response = $this->actingAs($kasir)->get('/dashboard');

    $response->assertRedirect(route('dashboard.kasir'));
    $this->actingAs($kasir)->get(route('dashboard.kasir'))->assertStatus(200)->assertSee('Point of Sale');
});

test('keuangan user redirects to keuangan dashboard', function () {
    $keuangan = User::where('email', 'keuangan@sibatik.lan')->first();

    $response = $this->actingAs($keuangan)->get('/dashboard');

    $response->assertRedirect(route('dashboard.keuangan'));
    $this->actingAs($keuangan)->get(route('dashboard.keuangan'))->assertStatus(200)->assertSee('Faktur & Pelunasan');
});

test('eksekutif user redirects to eksekutif dashboard', function () {
    $eksekutif = User::where('email', 'eksekutif@sibatik.lan')->first();

    $response = $this->actingAs($eksekutif)->get('/dashboard');

    $response->assertRedirect(route('dashboard.eksekutif'));
    $this->actingAs($eksekutif)->get(route('dashboard.eksekutif'))->assertStatus(200)->assertSee('Executive Information System');
});

test('cross role access is blocked with 403 forbidden', function () {
    $kasir = User::where('email', 'kasir@sibatik.lan')->first();
    $gudang = User::where('email', 'gudang@sibatik.lan')->first();

    // Kasir tries to access Admin dashboard -> 403
    $this->actingAs($kasir)->get(route('dashboard.admin'))->assertStatus(403);

    // Kasir tries to access Keuangan dashboard -> 403
    $this->actingAs($kasir)->get(route('dashboard.keuangan'))->assertStatus(403);

    // Gudang tries to access Kasir dashboard -> 403
    $this->actingAs($gudang)->get(route('dashboard.kasir'))->assertStatus(403);
});

