<?php

namespace App\Entity\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use DomainException;

class User extends Authenticatable
{
    use Notifiable;

    public const STATUS_WAIT = 'Wait';
    public const STATUS_ACTIVE = 'Active';

    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function register(string $name, string $email, string $password): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'verify_token' => Str::uuid(),
            'status' => self::STATUS_WAIT,
        ]);
    }

    public function verify(): void
    {
        if ($this->isActive()) {
            throw new DomainException('User is already activated.');
        }

        $this->update([
            'status' => User::STATUS_ACTIVE,
            'verify_token' => null
        ]);
    }

    public function draft(): void
    {
        if ($this->isWait()) {
            throw new DomainException('User is already drafted.');
        }

        $this->update([
            'status' => User::STATUS_WAIT,
            'verify_token' => Str::uuid()
        ]);
    }

    public function isWait(): bool
    {
        return $this->status == self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status == self::STATUS_ACTIVE;
    }
}
