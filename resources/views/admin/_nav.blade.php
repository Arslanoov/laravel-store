<ul class="nav nav-tabs mb-3">
    @can ('admin-panel')
        <li class="nav-item"><a class="nav-link {{ $page === '' ? ' active' : '' }}" href="{{ route('admin.home') }}">Dashboard</a></li>
    @endcan

    @can ('manage-users')
        <li class="nav-item"><a class="nav-link {{ $page === 'users' ? ' active' : '' }}" href="{{ route('admin.users.index') }}">Users</a></li>
    @endcan

    @can ('manage-pages')
        <li class="nav-item"><a class="nav-link{{ $page === 'pages' ? ' active' : '' }}" href="{{ route('admin.pages.index') }}">Pages</a></li>
    @endcan

    @can ('manage-blog')
        <li class="nav-item"><a class="nav-link {{ $page === 'blog-posts' ? ' active' : '' }}" href="{{ route('admin.blog.posts.index') }}">Blog Posts</a></li>
        <li class="nav-item"><a class="nav-link {{ $page === 'blog-categories' ? ' active' : '' }}" href="{{ route('admin.blog.categories.index') }}">Blog Categories</a></li>
        <li class="nav-item"><a class="nav-link {{ $page === 'blog-tags' ? ' active' : '' }}" href="{{ route('admin.blog.tags.index') }}">Blog Tags</a></li>
        <li class="nav-item"><a class="nav-link {{ $page === 'blog-comments' ? ' active' : '' }}" href="{{ route('admin.blog.comments.index') }}">Blog Comments</a></li>
    @endcan

    @can ('manage-shop')
        <li class="nav-item"><a class="nav-link {{ $page === 'shop-products' ? ' active' : '' }}" href="{{ route('admin.shop.products.index') }}">Shop Products</a></li>
        <li class="nav-item"><a class="nav-link {{ $page === 'shop-brands' ? ' active' : '' }}" href="{{ route('admin.shop.brands.index') }}">Shop Brands</a></li>
        <li class="nav-item"><a class="nav-link {{ $page === 'shop-categories' ? ' active' : '' }}" href="{{ route('admin.shop.categories.index') }}">Shop Categories</a></li>
        <li class="nav-item"><a class="nav-link {{ $page === 'shop-characteristics' ? ' active' : '' }}" href="{{ route('admin.shop.characteristics.index') }}">Shop Characteristics</a></li>
        <li class="nav-item"><a class="nav-link {{ $page === 'shop-comments' ? ' active' : '' }}" href="{{ route('admin.shop.comments.index') }}">Shop Comments</a></li>
        <li class="nav-item"><a class="nav-link {{ $page === 'shop-reviews' ? ' active' : '' }}" href="{{ route('admin.shop.reviews.index') }}">Shop Reviews</a></li>
        <li class="nav-item"><a class="nav-link {{ $page === 'shop-delivery-methods' ? ' active' : '' }}" href="{{ route('admin.shop.deliveryMethods.index') }}">Shop Delivery Methods</a></li>
    @endcan
</ul>

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach