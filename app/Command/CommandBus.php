<?php

namespace App\Command;

class CommandBus
{
    public function handle($command): void
    {
        $class = get_class($command) . 'Handler';
        $handler = app($class);
        $handler($command);
    }
}