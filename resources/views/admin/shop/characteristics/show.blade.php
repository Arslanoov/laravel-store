@extends('layouts.app')

@section('content')
    @include('admin.shop.characteristics._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.characteristics.edit', $characteristic) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.shop.characteristics.destroy', $characteristic) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <h4>Characteristic</h4>

    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $characteristic->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $characteristic->name }}</td>
        </tr>
        <tr>
            <th>Type</th><td>{{ $characteristic->type }}</td>
        </tr>
        <tr>
            <th>Required</th><td>{{ $characteristic->required ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <th>Default</th><td>{{ $characteristic->default }}</td>
        </tr>
        <tr>
            <th>Sort</th><td>{{ $characteristic->sort }}</td>
        </tr>
        </tbody>
    </table>

    <h4>Variants</h4>

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.characteristics.variants.create', $characteristic) }}" class="btn btn-success mr-1">Create Variant</a>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($variants as $variant)
                <tr>
                    <td>{{ $variant->id }}</td>
                    <td><a href="{{ route('admin.shop.characteristics.variants.show', compact('characteristic', 'variant')) }}">{{ $variant->name }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection