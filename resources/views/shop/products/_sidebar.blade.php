<div class="col-xl-3 col-lg-4 col-md-5">

    {{ Widget::run(\App\Widget\Shop\BrandsWidget::class) }}

    {{ Widget::run(\App\Widget\Shop\CategoriesWidget::class) }}

    @include ('shop.products._search')

</div>