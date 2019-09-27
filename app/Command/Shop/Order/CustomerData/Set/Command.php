<?php

namespace App\Command\Shop\Order\CustomerData\Set;

use App\Entity\Shop\Order\Order;
use App\Entity\User\User;

class Command
{
    public $name;
    public $surname;
    public $patronymic;
    public $email;
    public $phone;

    public $order;

    public function __construct(
        Order $order, User $user
    )
    {
        $this->order = $order;
        $this->name = $user->name;
        $this->surname = $user->profile->surname;
        $this->patronymic = $user->profile->patronymic;
        $this->email = $user->email;
        $this->phone = $user->profile->phone;
    }
}