<?php
namespace App\src\constraint;
use Config\Alexis\Parameter;

class CommentValidation extends Validation{
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
        if ($name === 'content') {
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
    private function checkContent($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('commentaire', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('commentaire', $value, 2);
        }
    }
}
