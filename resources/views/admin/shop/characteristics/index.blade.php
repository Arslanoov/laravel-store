@extends('layouts.admin')

@section('content')
    @include('admin.shop.characteristics._nav')

    <p><a href="{{ route('admin.shop.characteristics.create') }}" class="btn btn-success">Add Characteristic</a></p>

    <div class="card mb-3">
        <div class="card-header">Shop Characteristics</div>
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
                            <label for="type" class="col-form-label">Type</label>
                            <select class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" id="type">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}" {{ $type === request('type') ? ' selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="required" class="col-form-label">Required</label>
                            <select name="required" id="required" class="form-control{{ $errors->has('required') ? ' is-invalid' : '' }}">
                                <option value="1" @if (request('required') == 1) selected @endif>Yes</option>
                                <option value="0" @if (request('required') == 0) selected @endif>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="default" class="col-form-label">Default</label>
                            <input id="default" class="form-control" name="default" value="{{ request('default') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="sort" class="col-form-label">Sort</label>
                            <input id="sort" class="form-control" name="sort" value="{{ request('sort') }}">
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
            <th>Type</th>
            <th>Required</th>
            <th>Default</th>
            <th>Sort</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($characteristics as $characteristic)
            <tr>
                <td>{{ $characteristic->id }}</td>
                <td><a href="{{ route('admin.shop.characteristics.show', $characteristic) }}">{{ $characteristic->name }}</a></td>
                <td>{{ $characteristic->type }}</td>
                <td>{{ $characteristic->required ? 'Yes' : 'No' }}</td>
                <td>{{ $characteristic->default }}</td>
                <td>{{ $characteristic->sort }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $characteristics->links() }}

@endsection