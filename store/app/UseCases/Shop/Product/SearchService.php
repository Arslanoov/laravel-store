<?php

namespace App\UseCases\Shop\Product;

use App\Entity\Shop\Product\Product;
use App\Http\Requests\Shop\SearchRequest;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Query\Expression;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchService
{
    public function search(SearchRequest $request, int $perPage, int $page): LengthAwarePaginator
    {
        $items = Product::active()
            ->get();

        return new LengthAwarePaginator($items, 1, $perPage, $page);
    }
}
