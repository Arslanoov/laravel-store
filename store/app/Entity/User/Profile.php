<?php

namespace App\Entity\User;

use App\Entity\Region;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;

    protected $table = 'users_profile';
    protected $fillable = [
        'user_id', 'surname',
        'patronymic', 'phone', 'code'
    ];

    public static function blank(int $userId): self
    {
        return static::create([
            'user_id' => $userId
        ]);
    }

    public static function new(
        $userId,
        $surname, $patronymic,
        $phone, $code
    ): self
    {
        return static::create([
            'user_id' => $userId,
            'surname' => $surname,
            'patronymic' => $patronymic,
            'phone' => $phone,
            'code' => $code
        ]);
    }
}