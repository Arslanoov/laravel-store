<?php

namespace App\Command;

class CommandBus
{
    public function handle($command)
    {
        $class = get_class($command) . 'Handler';
        $handler = app($class);
        $value = $handler($command);
        return $value;
    }
}