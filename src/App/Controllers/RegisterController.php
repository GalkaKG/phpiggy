<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};

class RegisterController
{
    public function __construct(
        private TemplateEngine $view, 
        private ValidatorService $validatorService,
        private UserService $userService
        )
    {
    }

    public function registerView()
    {
        echo $this->view->render("/register.php");
    }

    public function register()
    {
        $this->validatorService->validateRegister($_POST);

        $this->userService->isEmailTaken($_POST['email']);

        $this->userService->create($_POST);

        redirectTo('/');
    }
}