<?php

namespace App\Command\Admin\Shop\Product\Photo\Create;

use App\Repository\Shop\Product\PhotoRepository;
use Illuminate\Support\Facades\DB;

class CommandHandler
{
    private $photos;

    public function __construct(PhotoRepository $photos)
    {
        $this->photos = $photos;
    }

    /**
     * @param Command $command
     * @throws \Throwable
     */
    public function __invoke(Command $command)
    {
        $files = $command->photos;
        $product = $command->product;

        DB::transaction(function () use ($product, $files) {
            foreach ($files as $file) {
                $product->photos()->create([
                    'product_id' => $product->id,
                    'photo' => $file->store('products', 'public')
                ]);
            }

            $product->update();
        });
    }
}