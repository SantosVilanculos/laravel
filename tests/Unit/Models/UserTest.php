<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\Hash;

test('to array', function (): void {
    $user = User::factory()->create();

    $user->refresh();

    expect($user->toArray())->toHaveSnakeCaseKeys();

    expect(array_keys($user->toArray()))
        ->toBe(
            [
                'id',
                'name',
                'email',
                'email_verified_at',
                'created_at',
                'updated_at',
            ]
        );
});

test('get hidden', function (): void {
    $user = User::factory()->create();

    expect($user->getHidden())->toBe(['password', 'remember_token']);

    expect($user->toArray())->not->toHaveKeys(['password', 'remember_token']);
});

test('get casts', function (): void {
    $user = User::factory()->create(['password' => 'password']);

    expect($user->getCasts())
        ->toBe(
            [
                'id' => 'int',
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
            ]
        );

    // id
    $this->assertIsInt($user->id);

    // email_verified_at
    $this->assertInstanceOf(Carbon\CarbonImmutable::class, $user->email_verified_at);

    // password
    $this->assertTrue(Hash::isHashed($user->password));
    $this->assertTrue(Hash::check('password', $user->password));
});

describe('email', function () {
    beforeEach(fn () => User::factory()->create(['email' => 'johndoe@example.test']));

    test('throws unique constraint violation exception', fn () => User::factory()->create(['email' => 'johndoe@example.test']))
        ->throws(UniqueConstraintViolationException::class);

    test('throws no exceptions', fn () => User::factory()->create(['email' => 'janedoe@example.test']))
        ->throwsNoExceptions();
});

// laravel/scout
test('to searchable array', function () {
    $user = User::factory()->create();

    expect(array_keys($user->toSearchableArray()))->toEqualCanonicalizing(['id', 'name', 'email', 'created_at']);
});
