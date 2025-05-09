<?php

declare(strict_types=1);

use App\Livewire\Components\Email;
use App\Livewire\Components\Image;
use App\Livewire\Components\Name;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\TestResponse;
use Livewire\Livewire;

use function Illuminate\Filesystem\join_paths;

test('redirects to login page', function (): void {
    /** @var TestResponse */
    $response = $this->get(route('settings.profile'));

    $response->assertRedirectToRoute('login');
});

test('returns a successful response', function (): void {
    $this->actingAs(User::factory()->create());

    /** @var TestResponse */
    $response = $this->get(route('settings.profile'));

    $response->assertOk();
});

// image
test('profile photo can be uploaded', function (): void {
    $user = User::factory()->create();

    $disk = Storage::fake('public');

    $image = UploadedFile::fake()->image('avatar.jpg', 256, 256)->size(1024);

    $this->actingAs($user);

    $response = Livewire::test(Image::class)
        ->set('image', $image);

    $response->assertHasNoErrors();

    $user->refresh();

    $disk->assertExists(join_paths('users', $image->hashName()));
});

test('only profile photos less than 2MB can be uploaded', function (): void {
    $user = User::factory()->create();

    $disk = Storage::fake('public');

    $image = UploadedFile::fake()->image('avatar.jpg', 256, 256)->size(4096);

    $this->actingAs($user);

    $response = Livewire::test(Image::class)
        ->set('image', $image);

    $response->assertHasErrors();

    $user->refresh();

    $disk->assertMissing(join_paths('users', $image->hashName()));
});

test('only profile photos 192x192 or more can be uploaded', function (): void {
    $user = User::factory()->create();

    $disk = Storage::fake('public');

    $image = UploadedFile::fake()->image('avatar.jpg', 128, 128)->size(1024);

    $this->actingAs($user);

    $response = Livewire::test(Image::class)
        ->set('image', $image);

    $response->assertHasErrors();

    $user->refresh();

    $disk->assertMissing(join_paths('users', $image->hashName()));
});

test('profile photo can be deleted', function (): void {

    $disk = Storage::fake('public');

    $path = UploadedFile::fake()
        ->image('image.jpg', 256, 256)
        ->size(1024)
        ->store('users', ['disk' => 'public']);

    $user = User::factory()->create(['image' => $path]);

    $this->actingAs($user);

    Livewire::test(Image::class)
        ->call('destroy');

    $disk->assertMissing($path);
});

// name
test('name can be updated', function (): void {
    $user = User::factory()->create(['name' => 'John Doe']);

    $this->actingAs($user);

    $response = Livewire::test(Name::class)
        ->fill(['name' => 'Jane Doe'])
        ->call('save');

    $response->assertHasNoErrors();

    expect($user->fresh()->name)->toBe('Jane Doe');
});

// email
test('email can be updated', function (): void {
    $user = User::factory()->create();

    $response = Livewire::actingAs($user)
        ->test(Email::class)
        ->set('email', 'test@example.com')
        ->call('save');

    $response->assertHasNoErrors();

    $user->refresh();

    expect($user->email)->toEqual('test@example.com');
    expect($user->email_verified_at)->toBeNull();
});

test('email verification status is unchanged when email address is unchanged', function (): void {
    $user = User::factory()->create();

    $response = Livewire::actingAs($user)
        ->test(Email::class)
        ->set('email', $user->email)
        ->call('save');

    $response->assertHasNoErrors();

    expect($user->fresh()->email_verified_at)->not->toBeNull();
});
