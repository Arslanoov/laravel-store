<?php

namespace App\Http\Controllers\Shop;

use App\Entity\Shop\Product\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Comment\CreateRequest as CommentCreateRequest;
use App\Http\Requests\Shop\Review\CreateRequest as ReviewCreateRequest;
use App\UseCases\Shop\CategoryService;
use App\UseCases\Shop\BrandService;
use App\UseCases\Shop\CommentService;
use App\UseCases\Shop\ProductService;
use App\UseCases\Shop\ReviewService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsController extends Controller
{
    private $productService;
    private $commentService;
    private $reviewService;
    private $categoryService;
    private $brandService;

    public function __construct(
        ProductService $productService,
        CommentService $commentService,
        ReviewService $reviewService,
        CategoryService $categoryService,
        BrandService $brandService
    )
    {
        $this->productService = $productService;
        $this->commentService = $commentService;
        $this->reviewService = $reviewService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
    }

    public function index()
    {
        $query = $this->productService->getAllProducts();
        $products = $query->paginate(10);

        return view('shop.products.index', compact('products'));
    }

    public function brand($slug)
    {
        $brand = $this->brandService->findBrandBySlug($slug);

        return view('shop.products.brand', compact('brand'));
    }

    public function category($slug)
    {
        $category = $this->categoryService->findCategoryBySlug($slug);

        return view('shop.products.category', compact('category'));
    }

    public function comment(CommentCreateRequest $request, Product $product)
    {
        $this->middleware('auth');

        $this->commentService->create($request, $product, Auth::guard()->id());

        return redirect()->route('shop.products.single', [
            'id' => $product->id,
            'slug' => $product->slug
        ]);
    }

    public function review(ReviewCreateRequest $request, Product $product)
    {
        $this->middleware('auth');

        $this->reviewService->create($request, $product, Auth::guard()->id());

        return redirect()->route('shop.products.single', [
            'id' => $product->id,
            'slug' => $product->slug
        ]);
    }

    public function single(int $id, string $slug)
    {
        if (!$product = $this->productService->findProductById($id)) {
            throw new NotFoundHttpException('Product is not found');
        }
        if (!$this->productService->findProductBySlug($id, $slug)) {
            return redirect()->route('shop.products.single', compact('id', 'slug'));
        }

        return view('shop.products.single', compact('product'));
    }
}