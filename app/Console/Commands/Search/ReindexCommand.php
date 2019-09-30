<?php

namespace App\Console\Commands\Search;

use App\Entity\Shop\Product\Product;
use App\Services\Search\ProductIndexer;
use Illuminate\Console\Command;

class ReindexCommand extends Command
{
    protected $signature = 'search:reindex';

    private $indexer;

    public function __construct(ProductIndexer $indexer)
    {
        parent::__construct();
        $this->indexer = $indexer;
    }

    public function handle(): bool
    {
        $this->indexer->clear();

        foreach (Product::active()->orderBy('id')->cursor() as $product) {
            $this->indexer->index($product);
        }

        return true;
    }
}