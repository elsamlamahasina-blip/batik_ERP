<?php

test('landing page loads successfully', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('SiBatik');
});

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
    $response->assertSee('SiBatik ERP');
});

test('unauthenticated users are redirected from dashboard to login', function () {
    $response = $this->get('/dashboard');

    $response->assertRedirect('/login');
});

test('unauthenticated users cannot access role specific dashboards', function () {
    $dashboards = [
        '/dashboard/admin',
        '/dashboard/pembelian',
        '/dashboard/gudang',
        '/dashboard/penjualan',
        '/dashboard/kasir',
        '/dashboard/keuangan',
        '/dashboard/eksekutif',
    ];

    foreach ($dashboards as $url) {
        $response = $this->get($url);
        $response->assertRedirect('/login');
    }
});
