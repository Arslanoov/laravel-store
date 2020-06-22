<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">Post Categories</h4>
    <ul class="list cat-list">
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}" class="d-flex justify-content-between">
                    <p>@for ($i = 0; $i < $category->depth; $i++) -- @endfor{{ $category->name }}</p>
                    <p>{{ $category->posts()->count() }}</p>
                </a>
            </li>
        @endforeach
    </ul>
    <div class="br"></div>
</aside>