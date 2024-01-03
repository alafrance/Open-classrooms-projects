<?php

namespace App\src\constraint;
use App\src\constraint\Validation;
use Config\Alexis\Parameter;
class UserValidation extends Validation {
    private $errors = [];
    private $constraint;
    public function __construct() {
        $this->constraint = new Constraint();
    }
    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if($name === 'name') {
            $error = $this->checkName($name, $value);
            $this->addError($name, $error);
        }
        else if ($name === 'email'){
            $error = $this->checkEmail($name, $value);
            $this->addError($name, $error);
        }

        else if ($name === 'password' ) {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }
        else if ($name === 'newPassword' ) {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }

    }
    private function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkName($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('pseudo', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('pseudo', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('pseudo', $value, 255);
        }
    }
    private function checkEmail($name, $value) {
        if ($this->constraint->notBlank($name, $value)){
            return $this->constraint->notBlank('email', $value);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('email', $value, 255);
        }
        if ($this->constraint->regexEmail($value)){
            return $this->constraint->regexEmail($value);
        }
    }

    private function checkPassword($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('mot de passe', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('mot de passe', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('mot de passe', $value, 255);
        }
        if ($this->constraint->regexPassword($value)){
            return $this->constraint->regexPassword($value);
        }
    }

}