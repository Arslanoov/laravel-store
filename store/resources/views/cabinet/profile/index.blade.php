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

                    @include ('cabinet._nav', ['page' => 'profile'])

                    @include ('layouts.partials.flash')

                    <table class="table table-bordered table-striped table-responsive">
                        <tr>
                            <th>ID</th><td>{{ $user->id }}</td>
                            <th>Name</th><td>{{ $user->name }}</td>
                            <td>
                                <a href="{{ route('cabinet.profile.fillForm') }}">
                                    <span class="lnr lnr-pencil"></span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Surname</th><td>{{ $user->profile->surname ?: 'Not Filled' }}</td>
                            <th>Patronymic</th><td>{{ $user->profile->patronymic ?: 'Not Filled' }}</td>
                        </tr>
                        <tr>
                            <th>E-mail</th><td>{{ $user->email }}</td>
                            <th>Phone</th><td>{{ $user->profile->phone ?: 'Not Filled' }}</td>
                        </tr>
                        <tr>
                            <th>Code</th><td>{{ $user->profile->code ?: 'Not Filled' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection