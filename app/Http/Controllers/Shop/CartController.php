<?php

namespace App\Http\Controllers\Shop;

use App\Entity\Shop\Cart\CartItem;
use App\Entity\Shop\Product\Product;
use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\UseCases\RegionService;
use App\UseCases\Shop\DeliveryService;
use App\UseCases\Shop\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $cartService;
    private $productService;
    private $deliveryService;
    private $regionService;

    public function __construct(
        CartService $cartService,
        ProductService $productService,
        DeliveryService $deliveryService,
        RegionService $regionService
    )
    {
        $this->middleware('auth');
        $this->cartService = $cartService;
        $this->productService = $productService;
        $this->deliveryService = $deliveryService;
        $this->regionService = $regionService;
    }

    public function index()
    {
        $cartItems = $this->cartService->findCartItemsByUserId(Auth::guard()->id());

        $totalWeight = $this->cartService->countTotalWeightByCartItems($cartItems);
        $deliveryMethods = $this->deliveryService->findDeliveryMethodsByWeight($totalWeight);

        $regions = $this->regionService->getRootRegions();

        return view('shop.cart.index', compact('cartItems', 'deliveryMethods', 'regions'));
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'quantity' => 'required|integer|min:1'
            ]);

            $productId = request()->post('productId');
            $quantity = request()->post('quantity');

            /** @var Product $product */
            $product = $this->productService->findProductById($productId);
            if ($product->isAvailable()) {
                $this->cartService->addItem($quantity, $product, Auth::guard()->id());
            }
        }
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

            return view('shop.cart.region', [
                'regions' => $regions
            ]);
        }
    }

    public function destroy(CartItem $cartItem)
    {
        $this->cartService->removeItem($cartItem, Auth::guard()->id());

        return redirect()->route('shop.cart.index');
    }

    public function destroyAll()
    {
        $userId = Auth::guard()->id();

        $cartItems = $this->cartService->findCartItemsByUserId($userId);
        $this->cartService->removeAllItems($cartItems, $userId);

        return redirect()->route('shop.cart.index');
    }
}