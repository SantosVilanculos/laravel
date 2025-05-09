<?php

declare(strict_types=1);

use Illuminate\Testing\TestResponse;

test('registration screen can be rendered', function (): void {
    /** @var TestResponse */
    $response = $this->get(route('register'));

    $response->assertStatus(200);
});

test('new users can register', function (): void {
    /** @var TestResponse */
    $response = $this->post(route('register'), [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirectToRoute('dashboard');
});
