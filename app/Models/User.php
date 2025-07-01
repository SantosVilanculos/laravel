<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Laravel\Scout\Searchable;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read string $email
 * @property-read \Carbon\CarbonImmutable|null $email_verified_at
 * @property-read string $password
 * @property-read string|null $remember_token
 * @property-read \Carbon\CarbonImmutable|null $created_at
 * @property-read \Carbon\CarbonImmutable|null $updated_at
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, Searchable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function shouldBeSearchable(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return array_merge(Arr::only($this->toArray(), ['name', 'email']), [
            'id' => (string) $this->id,
            'created_at' => (string) $this->created_at,
        ]);
    }
}
