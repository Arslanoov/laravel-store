<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link {{ $page === '' ? ' active' : '' }}" href="{{ route('admin.home') }}">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link {{ $page === 'users' ? ' active' : '' }}" href="{{ route('admin.users.index') }}">Users</a></li>
    <li class="nav-item"><a class="nav-link {{ $page === 'blog-categories' ? ' active' : '' }}" href="{{ route('admin.blog.categories.index') }}">Blog Categories</a></li>
    <li class="nav-item"><a class="nav-link {{ $page === 'blog-tags' ? ' active' : '' }}" href="{{ route('admin.blog.tags.index') }}">Blog Tags</a></li>
</ul>

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach