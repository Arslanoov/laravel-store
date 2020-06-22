<?php

namespace App\Repository\Shop;

use App\Entity\Shop\Brand;

class BrandRepository
{
    public function create(
        string $title,
        string $slug,
        $description
    ): Brand
    {
        $brand = Brand::new(
            $title,
            $slug,
            $description
        );

        return $brand;
    }

    public function update(
        Brand $brand,
        string $name,
        string $slug,
        $description
    ): void
    {
        $brand->update([
            'name' => $name,
            'slug' => $slug,
            'description' => $description
        ]);
    }

    public function remove(Brand $brand): void
    {
        $brand->delete();
    }
}