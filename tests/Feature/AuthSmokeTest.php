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

test('user can log in with seeded admin gmail account and redirects to admin dashboard', function () {
    $this->seed(\Database\Seeders\RoleAndUserSeeder::class);

    $response = $this->post('/login', [
        'email' => 'admin@gmail.com',
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard.admin'));
});

test('any new gmail address automatically logs in as admin without error', function () {
    $this->seed(\Database\Seeders\RoleAndUserSeeder::class);

    $response = $this->post('/login', [
        'email' => 'dela.pamekasan@gmail.com',
        'password' => 'bebas12345',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard.admin'));

    $user = \App\Models\User::where('email', 'dela.pamekasan@gmail.com')->first();
    expect($user)->not->toBeNull();
    expect($user->hasRole('admin'))->toBeTrue();
});


