<?php

namespace App\Repository\Shop\Characteristic;

use App\Entity\Shop\Characteristic\Characteristic;

class CharacteristicRepository
{
    public function create(
        $name, $type, $required,
        $default, $sort
    ): Characteristic
    {
        $characteristic = Characteristic::new(
            $name, $type,
            $required,
            $default, $sort
        );

        return $characteristic;
    }

    public function update(
        Characteristic $characteristic,
        $name, $type, $required,
        $default, $sort
    ): void
    {
        $characteristic->update([
            'name' => $name,
            'type' => $type,
            'required' => $required,
            'default' => $default,
            'sort' => $sort
        ]);
    }

    public function edit(
        Characteristic $characteristic,
        $name, $type, $required,
        $default, $sort
    ): void
    {
        $characteristic->update([
            'name' => $name,
            'type' => $type,
            'required' => $required,
            'default' => $default,
            'sort' => $sort
        ]);
    }

    public function remove(Characteristic $characteristic): void
    {
        $characteristic->delete();
    }
}