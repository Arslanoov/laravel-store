<?php

namespace App\Console\Commands\Newsletter\Email;

use App\Mail\Newsletter\SendMail;
use App\UseCases\Newsletter\EmailService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Mail\Mailer;

class SendCommand extends Command
{
    protected $signature = 'newsletter:send';

    protected $description = 'Set role for user';

    private $mailer;
    private $service;

    public function __construct(Mailer $mailer, EmailService $service)
    {
        parent::__construct();
        $this->mailer = $mailer;
        $this->service = $service;
    }

    public function handle(): bool
    {
        $emails = $this->service->getSubscribers();
        foreach ($emails as $emailItem) {
            $this->mailer->to($emailItem->email)->send(new SendMail());
        }
    }
}