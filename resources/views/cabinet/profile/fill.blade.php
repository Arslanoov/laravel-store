@extends ('layouts.app')

@section ('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Cabinet</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('cabinet.profile.fill') }}">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="surname" class="col-form-label">Surname</label>
                                    <input id="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname', $user->profile->surname ?: '') }}">
                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('surname') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="patronymic" class="col-form-label">Patronymic</label>
                                    <input id="patronymic" class="form-control{{ $errors->has('patronymic') ? ' is-invalid' : '' }}" name="patronymic" value="{{ old('patronymic', $user->profile->patronymic ?: '') }}">
                                    @if ($errors->has('patronymic'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('patronymic') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="col-form-label">Phone</label>
                                    <input id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $user->profile->phone ?: '') }}">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('phone') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="code" class="col-form-label">Code</label>
                                    <input id="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code', $user->profile->code ?: '') }}">
                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('code') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection