<?php

namespace App\Repository\Shop\Characteristic;

use App\Entity\Shop\Characteristic\Variant;

class VariantRepository
{
    public function create(int $characteristicId, string $name): Variant
    {
        $variant = Variant::new(
            $characteristicId, $name
        );

        return $variant;
    }

    public function update(Variant $variant, string $name): void
    {
        $variant->update([
            'name' => $name
        ]);
    }

    public function remove(Variant $variant): void
    {
        $variant->delete();
    }
}