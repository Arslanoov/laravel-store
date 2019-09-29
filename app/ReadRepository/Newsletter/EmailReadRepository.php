<?php

namespace App\ReadRepository\Newsletter;

use App\Entity\Newsletter\Email;

class EmailReadRepository
{
    public function findAll()
    {
        $emails = Email::all();
        return $emails;
    }
}