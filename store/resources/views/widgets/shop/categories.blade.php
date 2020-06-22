<div class="sidebar-categories">
    <div class="head">Browse Categories</div>
    <ul class="main-categories">
       @if ($categories)
            @foreach ($categories as $category)
                <li class="main-nav-list"><a data-toggle="collapse" href="#" aria-expanded="false" aria-controls="{{ $category->slug }}"><span class="lnr lnr-arrow-right"></span>{{ $category->name }}<span class="number">({{ $category->products()->count() }})</span></a>
                    @if ($category->children()->exists())
                        <ul class="collapse" id="{{ $category->slug }}" data-toggle="collapse" aria-expanded="false" aria-controls="{{ $category->slug }}">
                            @foreach ($category->children as $child)
                                <li class="main-nav-list child"><a href="#">{{ $child->name }}<span class="number">({{ $child->posts()->count() }})</span></a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
       @endif
    </ul>
</div>