<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Testing\TestResponse;

test('confirm password screen can be rendered', function (): void {
    $user = User::factory()->create();

    /** @var TestResponse */
    $response = $this->actingAs($user)->get(route('password.confirm'));

    $response->assertStatus(200);
});

test('password can be confirmed', function (): void {
    $user = User::factory()->create();

    /** @var TestResponse */
    $response = $this->actingAs($user)->post(route('password.confirm'), [
        'password' => 'password',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
}
);
test('password is not confirmed with invalid password', function (): void {
    $user = User::factory()->create();

    /** @var TestResponse */
    $response = $this->actingAs($user)->post(route('password.confirm'), [
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();
}
);
