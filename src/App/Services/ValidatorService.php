<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;
use Framework\Rules\{RequiredRule, EmailRule, MinRule};

class ValidatorService
{
    private Validator $validator;

    public function __construct() 
    {
        $this->validator = new Validator();

        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
        $this->validator->add('min', new MinRule());
    }

    public function validateRegister(array $formData) 
    {
        $this->validator->validate($formData, [
            'email' => ['required', 'email'],
            'age' => ['required', 'min:18'],
            'country' => ['required'],
            'socialMediaURL' => ['required'],
            'password' => ['required'],
            'confirmPassword' => ['required'],
            'tos' => ['required'],
        ]);
    }
}