@extends('layouts.app')

@section('meta')
    <meta name="description" content="{{ $page->description }}">
@endsection

@section('content')
    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="margin-top-bottom">
                            <h1 class="mb-3">{{ $page->title }}</h1>

                            @if ($page->children)
                                <ul class="list-unstyled">
                                    @foreach ($page->children as $child)
                                        <li><a href="{{ route('page', page_path($child)) }}">{{ $child->title }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                            {!! clean($page->content) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection