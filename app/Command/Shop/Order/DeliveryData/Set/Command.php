<?php

namespace App\Command\Shop\Order\DeliveryData\Set;

use App\Entity\Shop\Order\Order;
use App\Entity\User\User;
use App\Http\Requests\Shop\Order\CheckoutRequest;

class Command
{
    public $order;
    public $regionId;
    public $code;

    public function __construct(
        CheckoutRequest $request,
        Order $order,
        User $user
    )
    {
        $this->order = $order;
        $this->regionId = $request->region;
        $this->code = $user->profile->code;
    }
}