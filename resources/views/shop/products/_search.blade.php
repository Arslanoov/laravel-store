<div class="sidebar-filter mt-50">
    <div class="top-filter-head">Product Filters</div>
    <form action="{{ route('shop.products.search') }}" method="GET">
        @csrf

        <div class="common-filter">
            <div class="head">Title</div>
            <input type="text" name="title">
        </div>

        <div class="common-filter">
            <div class="head">Weight</div>
            <input type="text" name="weight">
        </div>

        <div class="common-filter">
            <div class="head">Availability</div>
            <select name="availability">
                <option value="0">Out Of Stock</option>
                <option value="1">In Stock</option>
            </select>
        </div>

        <div class="common-filter">
            <div class="head">Price</div>
            <div class="price-range-area">
                <div id="price-range"></div>
                <div class="value-wrapper d-flex">
                    <div class="price">Price:</div>
                    <span>$</span>
                    <div id="lower-value"></div>
                    <div class="to">to</div>
                    <span>$</span>
                    <div id="upper-value"></div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>