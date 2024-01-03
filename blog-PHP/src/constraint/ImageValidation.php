<?php
namespace App\src\constraint;

class ImageValidation extends Validation{
    private $errors = [];
    private $constraint;

    public function __construct() {
        $this->constraint = new Constraint();
    }
    public function check($name){
        if ($name === 'image'){
            $error = $this->checkImage($name);
            $this->addError($name, $error);
        }
        return $this->errors;
    }

    private function addError($name, $error){
        if ($error){
            $this->errors += [
               $name => $error
            ];
        }
    }
    public function checkImage($name){
        if ($this->constraint->notBlankImage($name)){
            return $this->constraint->notBlankImage($name);
        }
        if ($this->constraint->sizeImage($name)){
            return $this->constraint->sizeImage($name);
        }
        if ($this->constraint->notErrorImage($name)){
            return $this->constraint->notErrorImage($name);
        }
        if ($this->constraint->extensionAutorize($name)){
            return $this->constraint->extensionAutorize($name);
        }

    }
}