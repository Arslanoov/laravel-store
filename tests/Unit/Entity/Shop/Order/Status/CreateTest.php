<?php

namespace Tests\Unit\Entity\Shop\Order\Status;

use App\Entity\Shop\Order\Status;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function testNew(): void
    {
        $status = new Status(
            $value = Status::NEW,
            $createAt = time()
        );

        $this->assertEquals($status->value, $value);
        $this->assertEquals($status->created_at, $createAt);
    }
}