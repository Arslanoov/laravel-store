<?php

namespace App\Entity\Shop\Order;

use App\Entity\Shop\DeliveryMethod;
use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;
use DomainException;

class Order extends Model
{
    protected $table = 'shop_orders';
    protected $fillable = [
        'user_id', 'customer_data_id', 'delivery_data_id',
        'delivery_method_id', 'delivery_method_name',
        'delivery_method_cost', 'payment_method', 'cost', 'note',
        'current_status', 'cancel_reason'
    ];

    public static function new(
        $userId, $note, $cost
    ): self
    {
        return static::create([
            'user_id' => $userId,
            'note' => $note,
            'cost' => $cost,
            'current_status' => Status::NEW
        ]);
    }

    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->update([
            'payment_method' => $paymentMethod
        ]);
    }

    public function setDeliveryMethodInfo(int $id, string $name, int $cost): void
    {
        $this->update([
            'delivery_method_id' => $id,
            'delivery_method_name' => $name,
            'delivery_method_cost' => $cost
        ]);
    }

    public function setDeliveryDataInfo(int $deliveryDataId): void
    {
        $this->update([
            'delivery_data_id' => $deliveryDataId
        ]);
    }

    public function setCustomerDataInfo(int $customerDataId): void
    {
        $this->update([
            'customer_data_id' => $customerDataId
        ]);
    }

    public function pay($method): void
    {
        if ($this->isPaid()) {
            throw new DomainException('Order is already paid.');
        }

        $this->payment_method = $method;
        $this->addStatus(Status::PAID);
    }

    public function send(): void
    {
        if ($this->isSent()) {
            throw new DomainException('Order is already sent.');
        }

        $this->addStatus(Status::SENT);
    }

    public function complete(): void
    {
        if ($this->isCompleted()) {
            throw new DomainException('Order is already completed.');
        }

        $this->addStatus(Status::COMPLETED);
    }

    public function cancel($reason): void
    {
        if ($this->isCancelled()) {
            throw new DomainException('Order is already cancelled.');
        }
        if (!$this->canBeCanceled()) {
            throw new DomainException('Order cannot be canceled.');
        }

        $this->update([
            'cancel_reason' => $reason
        ]);

        $this->addStatus(Status::CANCELLED);
    }

    public function getTotalCost(): int
    {
        return $this->cost + $this->delivery_cost;
    }

    public function canBePaid(): bool
    {
        return $this->isNew();
    }

    public function canBeCanceled(): bool
    {
        return $this->isNew();
    }

    public function isNew(): bool
    {
        return $this->current_status == Status::NEW;
    }

    public function isPaid(): bool
    {
        return $this->current_status == Status::PAID;
    }

    public function isSent(): bool
    {
        return $this->current_status == Status::SENT;
    }

    public function isCompleted(): bool
    {
        return $this->current_status == Status::COMPLETED;
    }

    public function isCancelled(): bool
    {
        return $this->current_status == Status::CANCELLED;
    }

    private function addStatus($value): void
    {
        $this->update([
            'current_status' => $value
        ]);

        $this->statuses()->create([
            'value' => $value
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function deliveryMethod()
    {
        return $this->belongsTo(DeliveryMethod::class, 'delivery_method_id', 'id');
    }

    public function deliveryData()
    {
        return $this->belongsTo(DeliveryData::class, 'delivery_data_id', 'id');
    }

    public function customerData()
    {
        return $this->belongsTo(CustomerData::class, 'customer_data_id', 'id');
    }

    public function statuses()
    {
        return $this->hasMany(Status::class, 'id', 'order_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}