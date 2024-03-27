<?php

declare(strict_types=1);

namespace framework\Contracts;

interface MiddlewareInterface
{
    public function process(callable $next);
}