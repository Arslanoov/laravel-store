<?php

namespace App\Console\Commands\User;

use App\Entity\User\User;
use App\UseCases\Auth\RegisterService;
use Illuminate\Console\Command;
use DomainException;

class RoleCommand extends Command
{
    protected $signature = 'user:role {email} {role}';

    protected $description = 'Set role for user';

    private $service;

    public function __construct(RegisterService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): bool
    {
        $email = $this->argument('email');
        $role = $this->argument('role');

        /** @var User $user */

        $user = $this->service->findUserByEmail($email);
        if (!$user) {
            $this->error('Undefined user with email ' . $email);
            return false;
        }

        try {
            $user->changeRole($role);
        } catch (DomainException $e) {
            $this->error($e->getMessage());
            return false;
        }

        $this->info('Role is successfully changed');
        return true;
    }
}