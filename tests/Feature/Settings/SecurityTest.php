<?php

declare(strict_types=1);

use App\Livewire\Components\DeleteUser;
use App\Livewire\Components\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\TestResponse;
use Livewire\Livewire;

test('redirects to login page', function (): void {
    /** @var TestResponse */
    $response = $this->get(route('settings.security'));

    $response->assertRedirectToRoute('login');
});

test('returns a successful response', function (): void {
    $this->actingAs(User::factory()->create());

    /** @var TestResponse */
    $response = $this->get(route('settings.security'));

    $response->assertOk();
});

// password
test('password can be updated', function (): void {
    $user = User::factory()->create([
        'password' => 'password',
    ]);

    $this->actingAs($user);

    $response = Livewire::test(Password::class)
        ->set('current_password', 'password')
        ->set('password', 'new-password')
        ->set('password_confirmation', 'new-password')
        ->call('save');

    $response->assertHasNoErrors();

    expect(Hash::check('new-password', $user->fresh()->password))->toBeTrue();
});

test('correct password must be provided to update password', function (): void {
    $user = User::factory()->create([
        'password' => 'password',
    ]);

    $this->actingAs($user);

    $response = Livewire::test(Password::class)
        ->set('current_password', 'wrong-password')
        ->set('password', 'new-password')
        ->set('password_confirmation', 'new-password')
        ->call('save');

    $response->assertHasErrors(['current_password']);
});

// delete user
test('user can delete their account', function (): void {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = Livewire::test(DeleteUser::class)
        ->set('password', 'password')
        ->call('destroy');

    $response
        ->assertHasNoErrors()
        ->assertRedirectToRoute('login');

    expect($user->fresh())->toBeNull();
    expect(Auth::check())->toBeFalse();
});

test('correct password must be provided to delete account', function (): void {
    $user = User::factory()->create([
        'password' => 'password',
    ]);

    $this->actingAs($user);

    $response = Livewire::test(DeleteUser::class)
        ->set('password', 'wrong-password')
        ->call('destroy');

    $response
        ->assertHasErrors(['password'])
        ->assertNoRedirect();

    expect($user->fresh())->not->toBeNull();
    expect(Auth::check())->toBeTrue();
});
