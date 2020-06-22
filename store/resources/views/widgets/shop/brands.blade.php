<div class="sidebar-categories">
    <div class="head">Brands</div>
    <ul class="main-categories">
        @if ($brands)
            @foreach ($brands as $brand)
                <li class="main-nav-list">
                    <a href="#" aria-expanded="false">
                        {{ $brand->name }}
                        <span class="number">
                            ({{ $brand->products()->count() }})
                        </span>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>