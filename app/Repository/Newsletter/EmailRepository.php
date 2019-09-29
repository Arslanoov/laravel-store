<?php

namespace App\Repository\Newsletter;

use App\Entity\Newsletter\Email;

class EmailRepository
{
    public function add(string $email): Email
    {
        $item = Email::new($email);
        return $item;
    }
}