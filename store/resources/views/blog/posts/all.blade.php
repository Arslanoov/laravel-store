@extends('layouts.app')

@section ('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>All Posts</h1>
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

                        @include ('blog.posts._list')

                    </div>
                </div>

                @include ('blog.posts._sidebar')

            </div>
        </div>
    </section>
@endsection