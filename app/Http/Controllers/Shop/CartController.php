<?php

namespace App\Http\Controllers\Shop;

use App\Entity\Shop\Cart\CartItem;
use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\UseCases\Shop\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $cartService;
    private $productService;

    public function __construct(CartService $cartService, ProductService $productService)
    {
        $this->middleware('auth');
        $this->cartService = $cartService;
        $this->productService = $productService;
    }

    public function index()
    {
        $cartItems = $this->cartService->findCartItemsByUserId(Auth::guard()->id());

        return view('shop.cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'quantity' => 'required|integer|min:1'
            ]);

            $productId = request()->post('productId');
            $quantity = request()->post('quantity');

            $product = $this->productService->findProductById($productId);
            $this->cartService->addItem($quantity, $product, Auth::guard()->id());
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