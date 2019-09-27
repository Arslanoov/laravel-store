<?php

namespace App\Http\Controllers\Shop;

use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Order\CheckoutRequest;
use App\Services\CartService;
use App\UseCases\RegionService;
use App\UseCases\Shop\DeliveryService;
use App\UseCases\Shop\OrderService;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    private $regionService;
    private $cartService;
    private $deliveryService;
    private $orderService;

    public function __construct(
        RegionService $regionService,
        CartService $cartService,
        DeliveryService $deliveryService,
        OrderService $orderService
    )
    {
        $this->middleware('auth');
        $this->regionService = $regionService;
        $this->cartService = $cartService;
        $this->deliveryService = $deliveryService;
        $this->orderService = $orderService;
    }

    public function checkout()
    {
        $user = Auth::guard()->user();
        $regions = $this->regionService->getRootRegions();

        $cartItems = $this->cartService->findCartItemsByUserId($user->id);
        $totalWeight = $this->cartService->countTotalWeightByCartItems($cartItems);

        $deliveryMethods = $this->deliveryService->findDeliveryMethodsByWeight($totalWeight);

        return view('shop.orders.checkout', compact('user', 'regions', 'cartItems', 'deliveryMethods'));
    }

    public function checkoutForm(CheckoutRequest $request)
    {
        /** @var User $user */
        $user = Auth::guard()->user();

        $orderItems = $this->cartService->findCartItemsByUserId($user->id);
        $totalWeight = $this->cartService->countTotalWeightByCartItems($orderItems);
        $subtotalPrice = $this->cartService->countTotalPriceByCartItems($orderItems);

        $deliveryMethod = $this->deliveryService->findById($request->delivery);
        $totalPrice = $this->orderService->countTotalPrice($subtotalPrice, $deliveryMethod);

        $this->deliveryService->checkIsCorrectDeliveryMethod($deliveryMethod, $totalWeight);
        $order = $this->orderService->checkout($request, $deliveryMethod, $user, $totalPrice);

        $this->orderService->createOrderItems($orderItems, $order->id);
        $this->cartService->removeAllItems($orderItems, $user->id);

        return redirect()->route('cabinet.orders.show', $order);
    }

    public function region()
    {
        if (request()->ajax()) {
            $regionId = request()->post('regionId');
            $isReset = request()->post('isReset');

            if ($isReset) {
                $regions = $this->regionService->getRootRegions();
            } else {
                $selectedRegion = $this->regionService->findById($regionId);
                if ($selectedRegion->children()->exists()) {
                    $regions = $selectedRegion->children;
                } else {
                    return;
                }
            }

            return view('shop.orders.region', [
                'regions' => $regions
            ]);
        }
    }
}