<?php

namespace App\Command\Auth\Register;

use App\Repository\User\ProfileRepository;
use App\Repository\User\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Mail\Mailer;
use App\Mail\Auth\VerifyMail;

class CommandHandler
{
    private $mailer;
    private $dispatcher;
    private $users;
    private $profiles;

    public function __construct(
        Mailer $mailer,
        Dispatcher $dispatcher,
        UserRepository $users,
        ProfileRepository $profiles
    )
    {
        $this->mailer = $mailer;
        $this->dispatcher = $dispatcher;
        $this->users = $users;
        $this->profiles = $profiles;
    }

    public function __invoke(Command $command): void
    {
        $user = $this->users->register(
            $command->name,
            $command->email,
            $command->password
        );

        $this->profiles->blank($user->id);

        $this->mailer->to($user->email)->send(new VerifyMail($user));
        $this->dispatcher->dispatch(new Registered($user));
    }
}