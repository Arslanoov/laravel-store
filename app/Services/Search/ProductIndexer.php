<?php

namespace App\Services\Search;

use App\Entity\Shop\Product\Product;
use Elasticsearch\Client;
use stdClass;

class ProductIndexer
{
    private $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    public function clear(): void
    {
        $this->client->deleteByQuery([
            'index' => 'app',
            'type' => 'product',
            'body' => [
                'query' => [
                    'match_all' => new stdClass(),
                ],
            ],
        ]);
    }
    
    public function index(Product $product): void
    {
        $this->client->index([
            'index' => 'app',
            'type' => 'product',
            'id' => $product->id,
            'body' => [
                'id' => $product->id,
                'title' => $product->title,
                'content' => $product->content,
                'price' => $product->price,
                'rating' => $product->rating,
                'availability' => $product->availability,
                'weight' => $product->weight
            ],
        ]);
    }

    public function remove(Product $product): void
    {
        $this->client->delete([
            'index' => 'app',
            'type' => 'product',
            'id' => $product->id,
        ]);
    }
} 