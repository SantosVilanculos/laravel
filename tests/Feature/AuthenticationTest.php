<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Testing\TestResponse;

test('login screen can be rendered', function (): void {
    /** @var TestResponse */
    $response = $this->get(route('login'));

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function (): void {
    $user = User::factory()->create();

    /** @var TestResponse */
    $response = $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirectToRoute('dashboard');

});

test('users can not authenticate with invalid password', function (): void {
    $user = User::factory()->create();

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function (): void {
    $user = User::factory()->create();

    /** @var TestResponse */
    $response = $this->actingAs($user)->post(route('logout'));

    $this->assertGuest();
    $response->assertRedirectToRoute('login');
});
