<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;
use App\Entity\User\User;
use App\Entity\Blog\Category as BlogCategory;
use App\Entity\Shop\Category as ShopCategory;
use App\Entity\Blog\Tag;
use App\Entity\Blog\Post\Post;
use App\Entity\Blog\Comment as BlogComment;
use App\Entity\Shop\Comment as ShopComment;
use App\Entity\Page;
use App\Http\Router\PagePath;
use App\Entity\Shop\Brand;
use App\Entity\Shop\Characteristic\Characteristic;
use App\Entity\Shop\Characteristic\Variant;
use App\Entity\Shop\Product\Product;
use App\Entity\Shop\Product\Characteristic as ProductCharacteristics;
use App\Entity\Shop\Review;
use App\Entity\Shop\DeliveryMethod;

Breadcrumbs::register('home', function (Crumbs $crumbs) {
    $crumbs->push('Home', route('home'));
});

Breadcrumbs::register('login', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Login', route('login'));
});

Breadcrumbs::register('register', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Register', route('register'));
});

Breadcrumbs::register('password.request', function (Crumbs $crumbs) {
    $crumbs->parent('login');
    $crumbs->push('Reset Password', route('password.request'));
});

Breadcrumbs::register('password.reset', function (Crumbs $crumbs) {
    $crumbs->parent('password.request');
    $crumbs->push('Change', route('password.reset'));
});

// Cabinet

Breadcrumbs::register('cabinet.home', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Cabinet', route('cabinet.home'));
});

// Admin //

Breadcrumbs::register('admin.home', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Admin', route('admin.home'));
});

// Users

Breadcrumbs::register('admin.users.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Users', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.users.index');
    $crumbs->push('Create', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.show', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.index');
    $crumbs->push($user->name, route('admin.users.show', $user));
});

Breadcrumbs::register('admin.users.edit', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.show', $user);
    $crumbs->push('Edit', route('admin.users.edit', $user));
});

// Blog //

// Tags

Breadcrumbs::register('admin.blog.tags.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Blog Tags', route('admin.blog.tags.index'));
});

Breadcrumbs::register('admin.blog.tags.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.blog.tags.index');
    $crumbs->push('Create', route('admin.blog.tags.create'));
});

Breadcrumbs::register('admin.blog.tags.show', function (Crumbs $crumbs, Tag $tag) {
    $crumbs->parent('admin.blog.tags.index');
    $crumbs->push($tag->name, route('admin.blog.tags.show', $tag));
});

Breadcrumbs::register('admin.blog.tags.edit', function (Crumbs $crumbs, Tag $tag) {
    $crumbs->parent('admin.blog.tags.show', $tag);
    $crumbs->push('Edit', route('admin.blog.tags.edit', $tag));
});

// Categories

Breadcrumbs::register('admin.blog.categories.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Categories', route('admin.blog.categories.index'));
});

Breadcrumbs::register('admin.blog.categories.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.blog.categories.index');
    $crumbs->push('Create', route('admin.blog.categories.create'));
});

Breadcrumbs::register('admin.blog.categories.show', function (Crumbs $crumbs, BlogCategory $category) {
    if ($parent = $category->parent) {
        $crumbs->parent('admin.blog.categories.show', $parent);
    } else {
        $crumbs->parent('admin.blog.categories.index');
    }

    $crumbs->push($category->name, route('admin.blog.categories.show', $category));
});

Breadcrumbs::register('admin.blog.categories.edit', function (Crumbs $crumbs, BlogCategory $category) {
    $crumbs->parent('admin.blog.categories.show', $category);
    $crumbs->push('Edit', route('admin.blog.categories.edit', $category));
});

// Posts

Breadcrumbs::register('admin.blog.posts.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Blog Posts', route('admin.blog.tags.index'));
});

Breadcrumbs::register('admin.blog.posts.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.blog.tags.index');
    $crumbs->push('Create', route('admin.blog.tags.create'));
});

Breadcrumbs::register('admin.blog.posts.show', function (Crumbs $crumbs, Post $post) {
    $crumbs->parent('admin.blog.posts.index');
    $crumbs->push($post->title, route('admin.blog.posts.show', $post));
});

Breadcrumbs::register('admin.blog.posts.edit', function (Crumbs $crumbs, Post $post) {
    $crumbs->parent('admin.blog.posts.show', $post);
    $crumbs->push('Edit', route('admin.blog.posts.edit', $post));
});

// Comments

Breadcrumbs::register('admin.blog.comments.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Blog Comments', route('admin.blog.comments.index'));
});

Breadcrumbs::register('admin.blog.comments.show', function (Crumbs $crumbs, BlogComment $comment) {
    $crumbs->parent('admin.blog.comments.index');
    $crumbs->push($comment->id, route('admin.blog.comments.show', $comment));
});

Breadcrumbs::register('admin.blog.comments.edit', function (Crumbs $crumbs, BlogComment $comment) {
    $crumbs->parent('admin.blog.comments.show', $comment);
    $crumbs->push('Edit', route('admin.blog.comments.edit', $comment));
});

// Pages

Breadcrumbs::register('page', function (Crumbs $crumbs, PagePath $path) {
    if ($parent = $path->page->parent) {
        $crumbs->parent('page', $path->withPage($path->page->parent));
    } else {
        $crumbs->parent('home');
    }

    $crumbs->push($path->page->title, route('page', $path));
});

Breadcrumbs::register('admin.pages.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Pages', route('admin.pages.index'));
});

Breadcrumbs::register('admin.pages.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.pages.index');
    $crumbs->push('Create', route('admin.pages.create'));
});

Breadcrumbs::register('admin.pages.show', function (Crumbs $crumbs, Page $page) {
    if ($parent = $page->parent) {
        $crumbs->parent('admin.pages.show', $parent);
    } else {
        $crumbs->parent('admin.pages.index');
    }

    $crumbs->push($page->title, route('admin.pages.show', $page));
});

Breadcrumbs::register('admin.pages.edit', function (Crumbs $crumbs, Page $page) {
    $crumbs->parent('admin.pages.show', $page);
    $crumbs->push('Edit', route('admin.pages.edit', $page));
});

// Shop //

// Brand

Breadcrumbs::register('admin.shop.brands.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Shop Brands', route('admin.shop.brands.index'));
});

Breadcrumbs::register('admin.shop.brands.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.brands.index');
    $crumbs->push('Create', route('admin.shop.brands.create'));
});

Breadcrumbs::register('admin.shop.brands.show', function (Crumbs $crumbs, Brand $brand) {
    $crumbs->parent('admin.shop.brands.index');
    $crumbs->push($brand->name, route('admin.shop.brands.show', $brand));
});

Breadcrumbs::register('admin.shop.brands.edit', function (Crumbs $crumbs, Brand $brand) {
    $crumbs->parent('admin.shop.brands.show', $brand);
    $crumbs->push('Edit', route('admin.shop.brands.edit', $brand));
});

// Categories

Breadcrumbs::register('admin.shop.categories.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Categories', route('admin.shop.categories.index'));
});

Breadcrumbs::register('admin.shop.categories.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.categories.index');
    $crumbs->push('Create', route('admin.shop.categories.create'));
});

Breadcrumbs::register('admin.shop.categories.show', function (Crumbs $crumbs, ShopCategory $category) {
    if ($parent = $category->parent) {
        $crumbs->parent('admin.shop.categories.show', $parent);
    } else {
        $crumbs->parent('admin.shop.categories.index');
    }

    $crumbs->push($category->name, route('admin.shop.categories.show', $category));
});

Breadcrumbs::register('admin.shop.categories.edit', function (Crumbs $crumbs, ShopCategory $category) {
    $crumbs->parent('admin.shop.categories.show', $category);
    $crumbs->push('Edit', route('admin.shop.categories.edit', $category));
});

// Characteristics //

Breadcrumbs::register('admin.shop.characteristics.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Shop Characteristics', route('admin.shop.characteristics.index'));
});

Breadcrumbs::register('admin.shop.characteristics.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.characteristics.index');
    $crumbs->push('Create', route('admin.shop.characteristics.create'));
});

Breadcrumbs::register('admin.shop.characteristics.show', function (Crumbs $crumbs, Characteristic $characteristic) {
    $crumbs->parent('admin.shop.characteristics.index');
    $crumbs->push($characteristic->name, route('admin.shop.characteristics.show', $characteristic));
});

Breadcrumbs::register('admin.shop.characteristics.edit', function (Crumbs $crumbs, Characteristic $characteristic) {
    $crumbs->parent('admin.shop.characteristics.show', $characteristic);
    $crumbs->push('Edit', route('admin.shop.characteristics.edit', $characteristic));
});

// Variants

Breadcrumbs::register('admin.shop.characteristics.variants.create', function (Crumbs $crumbs, Characteristic $characteristic) {
    $crumbs->parent('admin.shop.characteristics.show', $characteristic);
    $crumbs->push('Create', route('admin.shop.characteristics.variants.create', $characteristic));
});

Breadcrumbs::register('admin.shop.characteristics.variants.show', function (Crumbs $crumbs, Characteristic $characteristic, Variant $variant) {
    $crumbs->parent('admin.shop.characteristics.show', $characteristic);
    $crumbs->push($variant->name, route('admin.shop.characteristics.variants.show', compact('characteristic', 'variant')));
});

Breadcrumbs::register('admin.shop.characteristics.variants.edit', function (Crumbs $crumbs, Characteristic $characteristic, Variant $variant) {
    $crumbs->parent('admin.shop.characteristics.show', $characteristic);
    $crumbs->push($variant->name, route('admin.shop.characteristics.variants.show', compact('characteristic', 'variant')));
    $crumbs->push('Edit', route('admin.shop.characteristics.variants.edit', compact('characteristic', 'variant')));
});

// Products

Breadcrumbs::register('admin.shop.products.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Shop Brands', route('admin.shop.products.index'));
});

Breadcrumbs::register('admin.shop.products.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.products.index');
    $crumbs->push('Create', route('admin.shop.products.create'));
});

Breadcrumbs::register('admin.shop.products.show', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.index');
    $crumbs->push($product->title, route('admin.shop.products.show', $product));
});

Breadcrumbs::register('admin.shop.products.edit', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push('Edit', route('admin.shop.products.edit', $product));
});

// Product Characteristics

Breadcrumbs::register('admin.shop.products.characteristics.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.products.index');
    $crumbs->push('Create', route('admin.shop.products.create'));
});

Breadcrumbs::register('admin.shop.products.characteristics.addVariant', function (Crumbs $crumbs, Product $product, ProductCharacteristics $productCharacteristics) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push('Edit', route('admin.shop.products.characteristics.addVariant', compact('product', 'productCharacteristics')));
});

// Comments

Breadcrumbs::register('admin.shop.comments.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Shop Comments', route('admin.shop.comments.index'));
});

Breadcrumbs::register('admin.shop.comments.show', function (Crumbs $crumbs, ShopComment $comment) {
    $crumbs->parent('admin.shop.comments.index');
    $crumbs->push($comment->id, route('admin.shop.comments.show', $comment));
});

Breadcrumbs::register('admin.shop.comments.edit', function (Crumbs $crumbs, ShopComment $comment) {
    $crumbs->parent('admin.shop.comments.show', $comment);
    $crumbs->push('Edit', route('admin.shop.comments.edit', $comment));
});

// Reviews

Breadcrumbs::register('admin.shop.reviews.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Shop Reviews', route('admin.shop.reviews.index'));
});

Breadcrumbs::register('admin.shop.reviews.show', function (Crumbs $crumbs, Review $review) {
    $crumbs->parent('admin.shop.reviews.index');
    $crumbs->push($review->id, route('admin.shop.reviews.show', $review));
});

Breadcrumbs::register('admin.shop.reviews.edit', function (Crumbs $crumbs, Review $review) {
    $crumbs->parent('admin.shop.reviews.show', $review);
    $crumbs->push('Edit', route('admin.shop.reviews.edit', $review));
});

// Delivery Methods

Breadcrumbs::register('admin.shop.deliveryMethods.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Shop Delivery Methods', route('admin.shop.deliveryMethods.index'));
});

Breadcrumbs::register('admin.shop.deliveryMethods.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.deliveryMethods.index');
    $crumbs->push('Create', route('admin.shop.deliveryMethods.create'));
});

Breadcrumbs::register('admin.shop.deliveryMethods.show', function (Crumbs $crumbs, DeliveryMethod $deliveryMethod) {
    $crumbs->parent('admin.shop.deliveryMethods.index');
    $crumbs->push($deliveryMethod->name, route('admin.shop.deliveryMethods.show', $deliveryMethod));
});

Breadcrumbs::register('admin.shop.deliveryMethods.edit', function (Crumbs $crumbs, DeliveryMethod $deliveryMethod) {
    $crumbs->parent('admin.shop.deliveryMethods.show', $deliveryMethod);
    $crumbs->push('Edit', route('admin.shop.deliveryMethods.edit', $deliveryMethod));
});