<?php

namespace App\UseCases\Shop\Product;

use App\Entity\Shop\Product\Product;
use App\Http\Requests\Shop\SearchRequest;
use Elasticsearch\Client;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Query\Expression;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchService
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function search(SearchRequest $request, int $perPage, int $page): Paginator
    {
        $values = array_filter((array)$request->input('attrs'), function ($value) {
            return !empty($value['equals']) || !empty($value['from']) || !empty($value['to']);
        });

        $response = $this->client->search([
            'index' => 'app',
            'type' => 'advert',
            'body' => [
                '_source' => ['id'],
                'from' => ($page - 1) * $perPage,
                'size' => $perPage,
                'sort' => empty($request['text']) ? [
                    ['published_at' => ['order' => 'desc']],
                ] : [],
                'query' => [
                    'bool' => [
                        'must' => array_merge(
                            [
                                ['term' => ['status' => Product::STATUS_ACTIVE]],
                            ],
                            array_map(function ($value, $id) {
                                return [
                                    'nested' => [
                                        'path' => 'values',
                                        'query' => [
                                            'bool' => [
                                                'must' => array_values(array_filter([
                                                    ['match' => ['values.attribute' => $id]],
                                                    !empty($value['equals']) ? ['match' => ['values.value_string' => $value['equals']]] : false,
                                                    !empty($value['from']) ? ['range' => ['values.value_int' => ['gte' => $value['from']]]] : false,
                                                    !empty($value['to']) ? ['range' => ['values.value_int' => ['lte' => $value['to']]]] : false,
                                                ])),
                                            ],
                                        ],
                                    ],
                                ];
                            }, $values, array_keys($values))
                        )
                    ],
                ],
            ],
        ]);

        $ids = array_column($response['hits']['hits'], '_id');

        if (!$ids) {
            return new LengthAwarePaginator([], 0, $perPage, $page);
        }

        $items = Product::active()
            ->whereIn('id', $ids)
            ->orderBy(new Expression('FIELD(id,' . implode(',', $ids) . ')'))
            ->get();

        return new LengthAwarePaginator($items, $response['hits']['total'], $perPage, $page);
    }
}