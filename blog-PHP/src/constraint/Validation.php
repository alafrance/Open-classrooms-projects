<?php
namespace App\src\constraint;

class Validation {
    public function validate($data, $name){
        if ($name === 'Article'){
            $articleValidation = new ArticleValidation();
            $errors = $articleValidation->check($data);
            return $errors;
        }
        else if ($name === 'Comment') {
            $commentValidation = new CommentValidation();
            $errors = $commentValidation->check($data);
            return $errors;
        }
        else if ($name === 'User') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
        else if($name === 'Image'){
            $imageValidation = new ImageValidation();
            $errors = $imageValidation->checkImage($data);
            return $errors;
        }
    }
}
