<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, AboutController, RegisterController};

function registerRoutes(App $app) 
{
    $app->get('/', [HomeController::class, 'home']);
    $app->get('/about', [AboutController::class, 'about']);
    $app->get('/register', [RegisterController::class, 'registerView']);
    $app->post('/register', [RegisterController::class, 'register']);
    $app->get('/login', [RegisterController::class, 'loginView']);
    $app->post('/login', [RegisterController::class, 'login']);
}