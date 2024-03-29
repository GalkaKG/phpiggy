<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class UserService
{
    public function __construct(private Database $db)
    {
        
    }
}