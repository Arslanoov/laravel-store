@extends('layouts.admin')

@section('content')
    @include('admin.shop.products._nav')

    <p><a href="{{ route('admin.shop.products.create') }}" class="btn btn-success">Add Product</a></p>

    <div class="card mb-3" id="product-manage">
        <div class="card-header">Shop Products</div>
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="availability" class="col-form-label">Availability</label>
                            <select name="availability" id="availability" class="form-control">
                                <option value=""></option>
                                @foreach ($availabilitiesList as $value => $label)
                                    <option value="{{ $value }}"{{ $value === request('availability') ? ' selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Title</label>
                            <input id="name" class="form-control" name="name" value="{{ request('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="slug" class="col-form-label">Slug</label>
                            <input id="slug" class="form-control" name="slug" value="{{ request('slug') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price</label>
                            <input id="price" class="form-control" name="price" value="{{ request('price') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="availability" class="col-form-label">Status</label>
                            <select name="availability" id="availability" class="form-control">
                                <option value=""></option>
                                @foreach ($statusesList as $value => $label)
                                    <option value="{{ $value }}"{{ $value === request('status') ? ' selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Availability</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Price</th>
            <th>Weight</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->category ? $product->category->name : 'Null' }}</td>
                <td>{{ $product->brand ? $product->brand->name : 'Null' }}</td>
                <td>
                    @if ($product->isAvailable())
                        In Stock
                    @endif

                    @if ($product->isUnavailable())
                        Out Of Stock
                    @endif
                </td>
                <td><a href="{{ route('admin.shop.products.show', $product) }}">{{ $product->title }}</a></td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->weight }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->status }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $products->links() }}

@endsection