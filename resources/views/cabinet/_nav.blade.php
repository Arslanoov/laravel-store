<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link {{ $page === 'home' ? ' active' : '' }}" href="{{ route('cabinet.home') }}">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link {{ $page === 'create-photo' ? ' active' : '' }}" href="{{ route('cabinet.photo.show') }}">Photo</a></li>
</ul>