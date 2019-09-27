<?php

namespace App\Command\Shop\Order\Order\Create;

use App\Http\Requests\Shop\Order\CheckoutRequest;

class Command
{
    public $userId;
    public $note;
    public $totalPrice;

    public function __construct(
        CheckoutRequest $request,
        int $userId,
        int $totalPrice
    )
    {
        $this->userId = $userId;
        $this->totalPrice = $totalPrice;
        $this->note = $request->note;
    }
}