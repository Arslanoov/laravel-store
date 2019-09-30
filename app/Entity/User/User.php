<?php

namespace App\Entity\User;

use App\Entity\Shop\Cart\CartItem;
use App\Entity\Shop\Order\Order;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use DomainException;
use Psr\Log\InvalidArgumentException;

class User extends Authenticatable
{
    use Notifiable;

    public const STATUS_WAIT = 'Wait';
    public const STATUS_ACTIVE = 'Active';

    public const ROLE_USER = 'User';
    public const ROLE_MANAGER = 'Manager';
    public const ROLE_ADMIN = 'Admin';

    protected $fillable = [
        'name', 'email', 'password', 'photo', 'status', 'verify_token', 'role'
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
            'role' => self::ROLE_USER
        ]);
    }

    public static function new(string $name, string $email): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => Str::uuid(),
            'status' => self::STATUS_ACTIVE,
            'role' => self::ROLE_USER
        ]);
    }

    public static function newActive(string $name, string $email, string $password): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'status' => self::STATUS_ACTIVE,
            'role' => self::ROLE_USER
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

    public function changeRole($role): void
    {
        if (!in_array($role, [
            self::ROLE_USER,
            self::ROLE_MANAGER,
            self::ROLE_ADMIN
        ], true)) {
            throw new InvalidArgumentException('Undefined role "' . $role . '"');
        }

        if ($this->role === $role) {
            throw new DomainException('Role is already assigned.');
        }

        $this->update([
            'role' => $role
        ]);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'id', 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'user_id', 'id');
    }

    public function comparisonItems()
    {
        return $this->hasMany(ComparisonItem::class, 'user_id', 'id');
    }

    public function hasFilledProfile(): bool
    {
        return
            !empty($this->profile->surname) &&
            !empty($this->profile->patronymic) &&
            !empty($this->profile->phone) &&
            !empty($this->profile->code);
    }

    public function getPhotoUrl(): string
    {
        return $this->photo ? '/storage/' . $this->photo : '';
    }

    public function isWait(): bool
    {
        return $this->status == self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status == self::STATUS_ACTIVE;
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isManager(): bool
    {
        return $this->role === self::ROLE_MANAGER;
    }

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
    }

    public static function statusesList(): array
    {
        return [
            User::STATUS_WAIT => 'Waiting',
            User::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function rolesList(): array
    {
        return [
            User::ROLE_USER => 'User',
            User::ROLE_MANAGER => 'Manager',
            User::ROLE_ADMIN => 'Admin'
        ];
    }
}
