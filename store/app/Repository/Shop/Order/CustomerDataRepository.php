<?php

namespace App\Repository\Shop\Order;

use App\Entity\Shop\Order\CustomerData;

class CustomerDataRepository
{
    public function create(
        string $name,
        string $surname,
        string $patronymic,
        string $email,
        int $phone
    ): CustomerData
    {
        $customerData = CustomerData::new(
            $name, $surname,
            $patronymic, $email, $phone
        );

        return $customerData;
    }
}