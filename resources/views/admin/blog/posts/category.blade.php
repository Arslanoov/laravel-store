@foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id == old('category', $category->id) ? ' selected' : '' }}>
                @for ($i = 0; $i < $category->depth; $i++) --- @endfor
                {{ $category->name }}
        </option>

        @include('admin.blog.posts.category', ['categories' => $category->children])

@endforeach