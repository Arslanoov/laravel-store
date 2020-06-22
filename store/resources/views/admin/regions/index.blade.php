@extends('layouts.admin')

@section('content')
    @include('admin.regions._nav')

    <p><a href="{{ route('admin.regions.create') }}" class="btn btn-success">Add Region</a></p>

    <div class="card mb-3">
        <div class="card-header">Regions</div>
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
                            <label for="parentId" class="col-form-label">Parent Id</label>
                            <input id="parentId" class="form-control" name="parentId" value="{{ request('parentId') }}">
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
            <th>Parent</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($regions as $region)
            <tr>
                <td>{{ $region->id }}</td>
                <td>{{ $region->parent ? $region->parent->name : 'Null' }}</td>
                <td><a href="{{ route('admin.regions.show', $region) }}">{{ $region->name }}</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $regions->links() }}

@endsection