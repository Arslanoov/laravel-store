<?php

namespace App\Entity\Newsletter;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public $timestamps = false;

    protected $table = 'newsletter_emails';
    protected $fillable = ['email'];

    public static function new(string $email): self
    {
        return static::create([
            'email' => $email
        ]);
    }
}