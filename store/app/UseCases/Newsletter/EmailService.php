<?php

namespace App\UseCases\Newsletter;

use App\Http\Requests\Newsletter\AddEmailRequest;
use App\Query\Newsletter\Email\Find\FindEmailsQuery;
use App\UseCases\Service;
use App\Command\Newsletter\Email\Add\Command as AddNewsletterEmail;

class EmailService extends Service
{
    public function add(AddEmailRequest $request)
    {
        $this->commandBus->handle(new AddNewsletterEmail($request));
    }

    public function getSubscribers()
    {
        $emails = $this->queryBus->query(new FindEmailsQuery());
        return $emails;
    }
}