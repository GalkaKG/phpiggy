<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
    HomeController,
    AboutController,
    RegisterController,
};
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
    $app->get('/about', [AboutController::class, 'about']);
    $app->get('/register', [RegisterController::class, 'registerView'])->add(GuestOnlyMiddleware::class);
    $app->post('/register', [RegisterController::class, 'register'])->add(GuestOnlyMiddleware::class);
    $app->get('/login', [RegisterController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [RegisterController::class, 'login'])->add(GuestOnlyMiddleware::class);
}
