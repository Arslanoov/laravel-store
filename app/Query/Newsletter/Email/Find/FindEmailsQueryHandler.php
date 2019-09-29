<?php

namespace App\Query\Newsletter\Email\Find;

use App\ReadRepository\Newsletter\EmailReadRepository;

class FindEmailsQueryHandler
{
    private $emails;

    public function __construct(EmailReadRepository $emails)
    {
        $this->emails = $emails;
    }

    public function __invoke(FindEmailsQuery $query)
    {
        $emails = $this->emails->findAll();
        return $emails;
    }
}