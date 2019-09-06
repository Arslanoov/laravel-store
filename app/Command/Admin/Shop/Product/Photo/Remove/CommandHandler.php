<?php

namespace App\Command\Admin\Shop\Product\Photo\Remove;

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
        $this->photos->remove($command->photo);
    }
}