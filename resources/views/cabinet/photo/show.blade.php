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

                    @include ('cabinet._nav', ['page' => 'create-photo'])

                    <h2>Photo:</h2>
                    <img src="{{ $user->getPhotoUrl() }}" alt="" class="img img-responsive" width="200px" height="200px">

                    <br><br>

                    <form action="{{ route('cabinet.photo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">File</label> <br>
                            <input type="file" name="file" id="file">
                        </div>

                        <div class="form-group">
                            <button type="submit">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection