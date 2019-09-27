<?php

namespace App\Entity\Shop\Order;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public const NEW = 1;
    public const PAID = 2;
    public const SENT = 3;
    public const COMPLETED = 4;
    public const CANCELLED = 5;
    public const CANCELLED_BY_CUSTOMER = 6;

    protected $table = 'shop_order_statuses';
    protected $fillable = ['value'];

    public static function new($value)
    {
        return static::create([
            'value' => $value
        ]);
    }
}