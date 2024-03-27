<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;

class Validator
{
    private $rules = [];

    public function add(string $alias, RuleInterface $rule) 
    {
        $this->rules[$alias] = $rule;
    }

    public function validate(array $formData, array $fields)
    {
        foreach($fields as $fieldName => $rules) {
            foreach($rules as $rule) {
                $ruleValidator = $this->rules[$rule];

                if($ruleValidator->validate($formData, $fieldName, [])) {
                    continue;
                }

                echo "Error";
            }
        }
    }
}