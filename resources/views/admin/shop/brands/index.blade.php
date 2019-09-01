@extends('layouts.app')

@section('content')
    @include('admin.shop.brands._nav')

    <p><a href="{{ route('admin.shop.brands.create') }}" class="btn btn-success">Add Brand</a></p>

    <div class="card mb-3">
        <div class="card-header">Shop Brands</div>
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
                            <label for="name" class="col-form-label">Name</label>
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
            <th>Name</th>
            <th>Slug</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td><a href="{{ route('admin.shop.brands.show', $brand) }}">{{ $brand->name }}</a></td>
                <td>{{ $brand->slug }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $brands->links() }}

@endsection