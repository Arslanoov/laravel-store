<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;
use App\Entity\User\User;
use App\Entity\Blog\Category;
use App\Entity\Blog\Tag;
use App\Entity\Blog\Post\Post;

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

Breadcrumbs::register('admin.blog.categories.show', function (Crumbs $crumbs, Category $category) {
    if ($parent = $category->parent) {
        $crumbs->parent('admin.blog.categories.show', $parent);
    } else {
        $crumbs->parent('admin.blog.categories.index');
    }

    $crumbs->push($category->name, route('admin.blog.categories.show', $category));
});

Breadcrumbs::register('admin.blog.categories.edit', function (Crumbs $crumbs, Category $category) {
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