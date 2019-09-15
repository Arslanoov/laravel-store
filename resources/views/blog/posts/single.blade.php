@extends ('layouts.app')

@section ('meta')
    <meta name="title" content="{{ $post->title }}">
    <meta name="description" content="{{ $post->description }}">
@endsection

@section ('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Blog Single</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('blog.posts.all') }}">Blog</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ $post->getImageUrl() }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('blog.posts.tag', $tag->name) }}">
                                            {{ $tag->name }}@if (!$loop->last), @endif
                                        </a>
                                    @endforeach
                                </div>
                                <ul class="blog_meta list">
                                    <li><a href="javascript:void(0);">{{ $post->author ? $post->author->name : 'None' }}<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="javascript:void(0);">{{ $post->created_at }}<i class="lnr lnr-calendar-full"></i></a></li>
                                    <li><a href="javascript:void(0);">{{ $post->views }} Views<i class="lnr lnr-eye"></i></a></li>
                                    <li><a href="#comments">{{ $post->comments }} Comments<i class="lnr lnr-bubble"></i></a></li>
                                    <li><a href="{{ route('blog.posts.category', ['slug' => $post->category->slug]) }}">{{ $post->category->name }} <i class="lnr lnr-cloud"></i></a></li>
                                    <li class="like" data-id="{{ $post->id }}"><a href="javascript:void(0);"><span id="likesCount_{{$post->id}}">{{ $post->likes }}</span> Likes<i class="lnr lnr-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{ $post->title }}</h2>
                            <p class="excert">
                                {{ Str::limit($post->description, 50) }}
                            </p>
                        </div>
                        <div class="col-lg-12">
                            {!! $post->content !!}
                        </div>
                    </div>

                    @include ('blog.posts._comments', $post)
                </div>

                @include ('blog.posts._sidebar')

            </div>
        </div>
    </section>
@endsection

@section ('script')
    <script>
        $(document).on("click", "#comments .reply-btn", function () {
            var link = $(this);
            var form = $("#reply-block");
            var comment = link.closest(".comment-list");
            $("#parent").val(comment.data("id"));
            form.detach().appendTo(comment.find(".reply-block:first"));
            return false;
        });
    </script>
@endsection