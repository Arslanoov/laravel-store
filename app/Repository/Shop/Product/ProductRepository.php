<?php

namespace App\Repository\Shop\Product;

use App\Entity\Shop\Product\Product;

class ProductRepository
{
    public function create(
        $categoryId, $brandId,
        $title, $slug, $price,
        $content, $weight, $quantity
    ): Product
    {
        $product = Product::new(
            $categoryId, $brandId,
            $title, $slug, $price,
            $content, $weight, $quantity
        );

        return $product;
    }

    public function update(
        Product $product,
        $categoryId, $title,
        $slug, $price, $content,
        $weight, $quantity
    ): void
    {
        $product->update([
            'category_id' => $categoryId,
            'title' => $title,
            'slug' => $slug,
            'price' => $price,
            'content' => $content,
            'weight' => $weight,
            'quantity' => $quantity
        ]);
    }

    public function remove(Product $product): void
    {
        $product->delete();
    }

    public function activate(Product $product): void
    {
        $product->activate();
    }

    public function draft(Product $product): void
    {
        $product->draft();
    }

    public function makeAvailable(Product $product): void
    {
        $product->makeAvailable();
    }

    public function makeUnavailable(Product $product): void
    {
        $product->makeUnavailable();
    }

    public function comment(Product $product): void
    {
        $product->addCommentsCount();
    }

    public function review(Product $product): void
    {
        $product->addReviewsCount();
    }

    public function removeComment(Product $product): void
    {
        $product->reduceCommentsCount();
    }

    public function removeReview(Product $product): void
    {
        $product->reduceReviewsCount();
    }

    public function recountRating(Product $product): void
    {
        $product->recountRating();
    }
}