@foreach ($posts as $post)
    <article class="row blog_item">
        <div class="col-md-3">
            <div class="blog_info text-right">
                <div class="post_tag">
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('blog.posts.tag', $tag->slug) }}">
                            {{ $tag->name }}@if (!$loop->last), @endif
                        </a>
                    @endforeach
                </div>
                <ul class="blog_meta list">
                    <li><a href="javascript:void(0);">{{ $post->author ? $post->author->name : 'None' }}<i class="lnr lnr-user"></i></a></li>
                    <li><a href="javascript:void(0);">{{ $post->created_at }}<i class="lnr lnr-calendar-full"></i></a></li>
                    <li><a href="javascript:void(0);">{{ $post->views }} Views<i class="lnr lnr-eye"></i></a></li>
                    <li><a href="{{ route('blog.posts.single', ['id' => $post->id, 'slug' => $post->slug, '#comments']) }}">{{ $post->comments }} Comments<i class="lnr lnr-bubble"></i></a></li>
                    <li><a href="{{ route('blog.posts.category', ['slug' => $post->category->slug]) }}">{{ $post->category->name }} <i class="lnr lnr-cloud"></i></a></li>
                    <li class="like" data-id="{{ $post->id }}"><a href="javascript:void(0);"><span id="likesCount_{{$post->id}}">{{ $post->likes }}</span> Likes<i class="lnr lnr-heart"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="blog_post">
                <img src="{{ $post->getImageUrl() }}" alt="">
                <div class="blog_details">
                    <a href="{{ route('blog.posts.single', ['id' => $post->id, 'slug' => $post->slug]) }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <p>
                        {{ Str::limit($post->description, 50) }}
                    </p>
                    <a href="{{ route('blog.posts.single', ['id' => $post->id, 'slug' => $post->slug]) }}" class="white_bg_btn">View More</a>
                </div>
            </div>
        </div>
    </article>
@endforeach

@if (!$posts)
    <h2>Posts Not Found</h2>
@endif

<nav class="blog-pagination justify-content-center d-flex">
    {{ $posts->links() }}
</nav>
