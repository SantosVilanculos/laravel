<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

test('create', function (): void {
    $user = User::factory()->create();

    $this->assertModelExists($user);
});

test('read', function (): void {
    $user = User::factory()->create();

    $model = User::find($user->id);

    $this->assertNotNull($model);

    expect($user->fresh()->toArray())->toBe($model->toArray());
});

test('update', function (): void {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'johndoe@example.test',
    ]);

    $user->update(
        [
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.test',
        ],
    );

    expect(Arr::only($user->fresh()->toArray(), ['name', 'email']))
        ->toBe(
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@example.test',
            ],
        );
});

test('delete', function (): void {
    $user = User::factory()->create();

    $user->delete();

    $this->assertModelMissing($user);
});

test('to array', function (): void {
    $user = User::factory()->create();

    $user->refresh();

    expect($user->toArray())
        ->toHaveSnakeCaseKeys();

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

    expect($user->getHidden())
        ->toBe(['password', 'remember_token']);
});

test('get casts', function (): void {
    $user = User::factory()->create();

    expect($user->getCasts())
        ->toMatchArray(
            [
                'id' => 'int',
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
            ]
        );
});

test('email', function (): void {
    User::factory()->create(['email' => 'johndoe@example.test']);

    User::factory()->create(['email' => 'johndoe@example.test']);
})->throws(UniqueConstraintViolationException::class);

test('email_verified_at', function (): void {
    $user = User::factory()->create();

    $user->refresh();

    $this->assertInstanceOf(Carbon\CarbonImmutable::class, $user->email_verified_at);
});

test('password', function (): void {
    $user = User::factory()->create(['password' => 'password']);

    $this->assertTrue(Hash::check('password', $user->password));
});
