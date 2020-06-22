@extends('layouts.app')

@section('content')
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

                    @include ('cabinet._nav', ['page' => 'wishlist'])

                    <h3>Wishlist</h3>

                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item->product->photos()->exists() ? $item->product->photos()->first()->getUrl() : '' }}" alt="" width="100px">
                                    </td>
                                    <td>
                                        <h6>
                                            <a href="{{ $item->product ? route('shop.products.single', ['id' => $item->product->id, 'slug' => $item->product->slug]) : '' }}">
                                                {{ $item->product ? $item->product->title : 'Deleted' }}
                                            </a>
                                        </h6>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection