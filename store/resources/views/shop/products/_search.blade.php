<div class="product-sidebar">
    <div class="sidebar-filter mt-50">
        <div class="top-filter-head">Product Filters</div>
        <form action="{{ route('shop.products.search') }}" method="GET">
            <div class="product-search">
                <div class="common-filter">
                    <div>Title</div>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="common-filter">
                    <div>Weight</div>
                    <input type="text" name="weight" class="form-control">
                </div>

                <div class="common-filter">
                    <div>Availability</div>
                    <select name="availability" class="form-control">
                        <option value="0">Out Of Stock</option>
                        <option value="1">In Stock</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
</div>
