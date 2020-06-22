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
    protected $fillable = [
        'order_id', 'value'
    ];

    public static function new($orderId, $value)
    {
        return static::create([
            'order_id' => $orderId,
            'value' => $value
        ]);
    }

    public function isNew(): bool
    {
        return $this->value == self::NEW;
    }

    public function isPaid(): bool
    {
        return $this->value == self::PAID;
    }

    public function isSent(): bool
    {
        return $this->value == self::SENT;
    }

    public function isCompleted(): bool
    {
        return $this->value == self::COMPLETED;
    }

    public function isCancelled(): bool
    {
        return $this->value == self::CANCELLED
            || $this->value == self::CANCELLED_BY_CUSTOMER;
    }

    public function isCancelledByCustomer(): bool
    {
        return $this->value == self::CANCELLED_BY_CUSTOMER;
    }

    public function isCancelledByAdmin(): bool
    {
        return $this->value == self::CANCELLED;
    }
}