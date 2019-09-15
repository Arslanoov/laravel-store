<?php

namespace App\Widget\Shop;

use App\UseCases\Shop\BrandService;
use Arrilot\Widgets\AbstractWidget;

class BrandsWidget extends AbstractWidget
{
    protected $config = [];

    private $service;

    public function __construct(BrandService $service, array $config = [])
    {
        parent::__construct($config);
        $this->service = $service;
    }

    public function run()
    {
        $brands = $this->service->getAllBrands();

        return view('widgets.shop.brands', compact('brands'));
    }
}