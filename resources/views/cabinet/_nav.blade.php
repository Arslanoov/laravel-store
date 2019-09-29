<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link {{ $page === 'home' ? ' active' : '' }}" href="{{ route('cabinet.home') }}">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link {{ $page === 'profile' ? ' active' : '' }}" href="{{ route('cabinet.profile.index') }}">Profile</a></li>
    @if ($user->hasFilledProfile())
        <li class="nav-item"><a class="nav-link {{ $page === 'orders' ? ' active' : '' }}" href="{{ route('cabinet.orders.index') }}">Orders</a></li>
    @endif
    <li class="nav-item"><a class="nav-link {{ $page === 'wishlist' ? ' active' : '' }}" href="{{ route('cabinet.wishlist.index') }}">Wishlist</a></li>
    <li class="nav-item"><a class="nav-link {{ $page === 'create-photo' ? ' active' : '' }}" href="{{ route('cabinet.photo.show') }}">Photo</a></li>
</ul>