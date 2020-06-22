@extends('layouts.app')

@section('meta')
    <meta name="title" content="{{ $page->title }}">
    <meta name="description" content="{{ $page->description }}">
@endsection

@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>{{ $page->title }}</h1>

                    @if ($page->children)
                        <nav class="d-flex align-items-center">
                            @foreach ($page->children as $child)
                                <a href="{{ route('page', page_path($child)) }}">{{ $child->title }}@if (!$loop->last), @endif</a>
                            @endforeach
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="mb-3">{{ $page->title }}</h1>

                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection
