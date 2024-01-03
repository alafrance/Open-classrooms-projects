<?php
namespace App\src\constraint;
use Config\Alexis\Parameter;
class MailValidation extends Validation {
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
        if($name === 'firstName') {
            $error = $this->checkFirstName($name, $value);
            $this->addError($name, $error);
        }
        else if ($name === 'lastName'){
            $error = $this->checkLastName($name, $value);
            $this->addError($name, $error);
        }
        else if($name === 'email'){
            $error = $this->checkEmail($name, $value);
            $this->addError($name, $error);
        }
        else if($name === 'content'){
            $error = $this->checkContent($name, $value);
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
    private function checkFirstName($name, $value){
        if ($this->constraint->notBlank($name, $value)){
            return $this->constraint->notBlank('prénom', $value) ;
        }
    }
    private function checkLastName($name, $value){
        if ($this->constraint->notBlank($name, $value)){
            return $this->constraint->notBlank('prénom', $value) ;
        }
    }
    private function checkEmail($name, $value){
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
    private function checkContent($name, $value){
        if ($this->constraint->notBlank($name, $value)){
            return $this->constraint->notBlank('Message', $value) ;
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('Message', $value, 2);
        }
    }
}