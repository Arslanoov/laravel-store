@extends('layouts.app')

@section('content')
    @include('admin.shop.products._nav')

    <h3>Product</h3>

    <hr>

    <h4>Manage</h4>

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.products.edit', $product) }}" class="btn btn-primary mr-1">Edit</a>

        @if ($product->isAvailable())
            <form method="POST" action="{{ route('admin.shop.products.unavailable', $product) }}" class="mr-1">
                @csrf
                <button class="btn btn-danger">Make Unavailable</button>
            </form>
        @endif

        @if ($product->isUnavailable())
            <form method="POST" action="{{ route('admin.shop.products.available', $product) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">Make Available</button>
            </form>
        @endif

        @if ($product->isDraft())
            <form method="POST" action="{{ route('admin.shop.products.activate', $product) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">Activate</button>
            </form>
        @endif

        @if ($product->isActive())
            <form method="POST" action="{{ route('admin.shop.products.draft', $product) }}" class="mr-1">
                @csrf
                <button class="btn btn-danger">Draft</button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.shop.products.destroy', $product) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <hr>

    <h4>Info</h4>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>Category</th><td>{{ $product->category ? $product->category->name : 'Null' }}</td>
        </tr>
        <tr>
            <th>Brand</th><td>{{ $product->brand ? $product->brand->name : 'Null' }}</td>
        </tr>
        <tr>
            <th>Availability</th>
            <td>
                @if ($product->isAvailable())
                    In Stock
                @endif

                @if ($product->isUnavailable())
                    Out Of Stock
                @endif
            </td>
        </tr>
        <tr>
            <th>Title</th><td>{{ $product->title }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $product->slug }}</td>
        </tr>
        <tr>
            <th>Price</th><td>{{ $product->price }}</td>
        </tr>
        <tr>
            <th>Status</th><td>{{ $product->status }}</td>
        </tr>
        </tbody>
    </table>

    <hr>

    <h4 id="photos">Photos</h4>

    <form method="POST" action="{{ route('admin.shop.products.photos.store', $product) }}" enctype="multipart/form-data" class="form-inline">
        @csrf

        <div class="form-group">
            <input id="photos" type="file" class="form-control{{ $errors->has('photos') ? ' is-invalid' : '' }}" name="photos[]" multiple>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>

    <br>

    @if ($product->photos()->exists())
        @foreach ($product->photos as $photo)
            <img src="{{ $product->getImageUrl($photo->photo) }}" alt="" width="100%" class="img img-responsive">

            <form method="POST" action="{{ route('admin.shop.products.photos.destroy', compact('product', 'photo')) }}">
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>

            <hr>
        @endforeach

        <form method="POST" action="{{ route('admin.shop.products.photos.destroyAll', compact('product')) }}">
            @csrf
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Delete All</button>
            </div>
        </form>
    @else
        <p><b>The product has no photos</b></p>
    @endif

    <hr>

    <h4 id="characteristics">Characteristics</h4>

    <div class="form-group">
        <a href="{{ route('admin.shop.products.characteristics.create', $product) }}" class="btn btn-success mr-1">Create</a>
    </div>

    @if ($product->characteristics()->exists())
        <table class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th>Characteristic</th>
                <th>Variant</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($product->characteristics as $productCharacteristic)
                <tr>
                    <td>{{ $productCharacteristic->characteristic->name }}</td>
                    <td>
                        <a href="{{ $productCharacteristic->variant ? '#' : route('admin.shop.products.characteristics.addVariant', ['product' => $product, 'characteristic' => $productCharacteristic]) }}">
                            {{ $productCharacteristic->variant ? $productCharacteristic->variant->name : 'Create Variant' }}
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.shop.products.characteristics.destroy', ['product' => $product, 'characteristic' => $productCharacteristic]) }}">
                            @csrf
                            <div class="form-group">
                                <button type="submit">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p><b>The product has no characteristics</b></p>
    @endif

    <hr>

    <h4>Content</h4>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <td>{!! $product->content !!}</td>
        </tr>
        </tbody>
    </table>
@endsection