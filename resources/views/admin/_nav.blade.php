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
        <li class="nav-item"><a class="nav-link {{ $page === 'shop-brands' ? ' active' : '' }}" href="{{ route('admin.shop.brands.index') }}">Shop Brands</a></li>
    @endcan
</ul>

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach