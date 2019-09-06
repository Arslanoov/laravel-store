<?php

namespace App\Command\Admin\Shop\Product\Photo\RemoveAll;

use App\Repository\Shop\Product\PhotoRepository;

class CommandHandler
{
    private $photos;

    public function __construct(PhotoRepository $photos)
    {
        $this->photos = $photos;
    }

    public function __invoke(Command $command)
    {
        $photos = $command->photos;

        foreach ($photos as $photo) {
            $this->photos->remove($photo);
        }
    }
}