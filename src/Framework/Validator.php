<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;
use Framework\Exceptions\ValidationException;

class Validator
{
    private $rules = [];

    public function add(string $alias, RuleInterface $rule) 
    {
        $this->rules[$alias] = $rule;
    }

    public function validate(array $formData, array $fields)
    {
        $errors = [];

        foreach($fields as $fieldName => $rules) {
            foreach($rules as $rule) {
                $ruleValidator = $this->rules[$rule];

                if($ruleValidator->validate($formData, $fieldName, [])) {
                    continue;
                }

                $errors[$fieldName][] = $ruleValidator->getMessage($formData, $fieldName, []);
            }
        }

        if (count($errors)) {
            throw new ValidationException($errors);
        }
    }
}