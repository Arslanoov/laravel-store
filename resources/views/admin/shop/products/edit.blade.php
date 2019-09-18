@extends('layouts.admin')

@section('content')
    @include('admin.shop.products._nav')

    <form method="POST" action="{{ route('admin.shop.products.update', $product) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="category" class="col-form-label">Category</label>

            <select id="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category">
                <option value=""></option>
                @include('admin.shop.products.category', ['categories' => $categories])
            </select>

            @if ($errors->has('category'))
                <span class="invalid-feedback"><strong>{{ $errors->first('category') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="brand" class="col-form-label">Brand</label>

            <select id="brand" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand">
                <option value=""></option>
                @include('admin.shop.products.brand', ['brands' => $brands])
            </select>

            @if ($errors->has('brand'))
                <span class="invalid-feedback"><strong>{{ $errors->first('brand') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="title" class="col-form-label">Title</label>
            <input id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $product->title) }}" required>
            @if ($errors->has('title'))
                <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="slug" class="col-form-label">Slug</label>
            <input id="slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $product->slug) }}" required>
            @if ($errors->has('slug'))
                <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="price" class="col-form-label">Price</label>
            <input id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price', $product->price) }}" required>
            @if ($errors->has('price'))
                <span class="invalid-feedback"><strong>{{ $errors->first('price') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="weight" class="col-form-label">Weight</label>
            <input id="weight" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight', $product->weight) }}" required>
            @if ($errors->has('weight'))
                <span class="invalid-feedback"><strong>{{ $errors->first('weight') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="text" class="col-form-label">Content</label>
            <textarea id="text" class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" rows="10">{{ old('text', $product->content) }}</textarea>
            @if ($errors->has('text'))
                <span class="invalid-feedback"><strong>{{ $errors->first('text') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace("text", {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            });
        });
    </script>

@endsection