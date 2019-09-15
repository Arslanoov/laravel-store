<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="table-responsive">
        <table class="table">
            <tbody>
            @if ($product->characteristics()->exists())
                @foreach ($product->characteristics as $productCharacteristic)
                    <tr>
                        <td>
                            <h5>{{ $productCharacteristic->characteristic->name }}</h5>
                        </td>
                        <td>
                            <h5>{{ $productCharacteristic->variant->name }}</h5>
                        </td>
                    </tr>
                @endforeach
            @else
                <p><b>The product has no characteristics</b></p>
            @endif
            </tbody>
        </table>
    </div>
</div>