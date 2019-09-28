<?php

namespace App\Http\Controllers\Shop;

use App\Entity\Shop\Order\Order;
use App\Http\Controllers\Controller;
use App\UseCases\Shop\OrderService;
use Request;
use FreeKassa;

class PaymentController extends Controller
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function searchOrder(Request $request, $order_id)
    {
        /** @var Order $order */
        $order = $this->service->findById($order_id);
        $result = [];

        if ($order) {
            $result['id'] = $order->id;
            $result['_orderSum'] = $order->cost;
            $result['_orderStatus'] = $order->isPaid() ? 'paid' : false;
            return $result;
        }

        return false;
    }

    public function paidOrder(Request $request, $order)
    {
        $order = $this->service->findById($order['id']);
        $this->service->pay($order);

        return true;
    }

    public function handlePayment(Request $request)
    {
        return FreeKassa::handle($request);
    }
}