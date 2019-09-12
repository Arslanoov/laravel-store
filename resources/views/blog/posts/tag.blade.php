@extends('layouts.app')

@section ('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>{{ $tag->name }}</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('blog.posts.all') }}">Blog</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    @include ('blog.posts._other')

    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach ($tag->posts as $post)
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
                                            <li><a href="javascript:void(0);">{{ $post->comments }} Comments<i class="lnr lnr-bubble"></i></a></li>
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

                            @if (!$tag->posts()->exists())
                                <h2>Posts Not Found</h2>
                            @endif

                    </div>
                </div>

                @include ('blog.posts._sidebar')

            </div>
        </div>
    </section>
@endsection