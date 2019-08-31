@extends('layouts.app')

@section('content')
    @include('admin.blog.posts._nav')

    <form method="POST" action="{{ route('admin.blog.posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="category" class="col-form-label">Category</label>

            <select id="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category">
                <option value=""></option>
                @include('admin.blog.posts.category', ['categories' => $categories])
            </select>

            @if ($errors->has('category'))
                <span class="invalid-feedback"><strong>{{ $errors->first('category') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="tags" class="col-form-label"><b>Tags</b></label> <br>

            <div class="row">
                <div class="col-sm-6">
                    <label for="tagsExisting" class="col-form-label">Existing</label> <br>
                    @foreach($tags as $tag)
                        <input type="checkbox" id="tagsExisting" name="tagsExisting[]" value="{{ $tag->id }}" @if ($post->hasTag($tag->id)) checked @endif>

                        <span style="margin-right: 10px;">{{ $tag->name }}</span>

                    @endforeach
                </div>

                <div class="col-sm-6">
                    <label for="tagsNew" class="col-form-label">New</label> <br>
                    <input id="tagsNew" class="form-control" name="tagsNew">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="photo" class="col-form-label">Photo</label>
            <input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo">
            <img src="{{ $post->getImageUrl() }}" width="90%" class="img img-responsive" alt="">
        </div>

        <div class="form-group">
            <label for="title" class="col-form-label">Title</label>
            <input id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $post->title }}" required>
            @if ($errors->has('title'))
                <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="slug" class="col-form-label">Slug</label>
            <input id="slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ $post->slug }}" required>
            @if ($errors->has('slug'))
                <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="description" class="col-form-label">Description</label>
            <textarea id="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="10">{{ $post->description }}</textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="text" class="col-form-label">Content</label>
            <textarea id="text" class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" rows="10">{{ $post->content }}</textarea>
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