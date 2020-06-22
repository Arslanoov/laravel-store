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

                    @include ('cabinet._nav', ['page' => 'comparison'])

                    <h3>Comparison</h3>

                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Characteristic</th>
                            @foreach ($user->comparisonItems as $item)
                                <th>
                                    <p>
                                        {{ $item->product->title }} {{ $item->product->category()->exists() ? "(" . $item->product->category->name . ")" : '' }}
                                    </p>
                                    <img src="{{ $item->product->photos()->exists() ? $item->product->photos()->first()->getUrl() : '' }}" alt="" width="100px">
                                </th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($characteristics as $characteristicId => $characteristic)
                            <tr>
                                <td>{{ $characteristic->name }}</td>
                                @foreach ($user->comparisonItems as $item)
                                    @foreach ($item->product->characteristics->where('characteristic_id', $characteristicId) as $characteristicItem)
                                        <td class="green">
                                            {{ $characteristicItem->variant ? $characteristicItem->variant->name : $characteristicItem->characteristic->default }}
                                        </td>
                                    @endforeach

                                    @if (!$item->product->characteristics()->where('characteristic_id', $characteristicId)->exists())
                                        <td class="red">Empty</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection