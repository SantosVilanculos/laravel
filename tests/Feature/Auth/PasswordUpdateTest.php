<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\TestResponse;

test('password can be updated', function () {
    $user = User::factory()->create();

    /** @var TestResponse */
    $response = $this
        ->actingAs($user)
        ->from(route('profile'))
        ->put(route('password.update'), [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirectToRoute('profile');

    $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
});

test('correct password must be provided to update password', function () {
    $user = User::factory()->create();

    /** @var TestResponse */
    $response = $this
        ->actingAs($user)
        ->from(route('profile'))
        ->put(route('password.update'), [
            'current_password' => 'wrong-password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertSessionHasErrors('current_password')
        ->assertRedirectToRoute('profile');
});
