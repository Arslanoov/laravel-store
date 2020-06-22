<?php

namespace App\Command\Admin\Shop\Order\Cancel;

use App\Entity\Shop\Order\Order;
use App\Http\Requests\Admin\Shop\Order\CancelRequest;

class Command
{
    public $order;
    public $reason;

    public function __construct(Order $order, CancelRequest $request)
    {
        $this->order = $order;
        $this->reason = $request->reason;
    }
}