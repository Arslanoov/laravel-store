<?php

namespace App\Query;

class QueryBus
{
    public function query($query)
    {
        $class = get_class($query) . 'Handler';
        $handler = app($class);
        $result = $handler($query);
        return $result;
    }
}