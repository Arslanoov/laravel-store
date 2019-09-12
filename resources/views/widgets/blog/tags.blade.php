<aside class="single-sidebar-widget tag_cloud_widget">
    <h4 class="widget_title">Tag Clouds</h4>
    <ul class="list">
        @foreach ($tags as $tag)
            <li><a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
    <div class="br"></div>
</aside>