<?php
namespace App\src\constraint;

class Validation {
    public function validate($data, $name){
        if ($name === 'User') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
        else if($name === 'Article'){
            $articleValidation = new ArticleValidation();
            $errors = $articleValidation->check($data);
            return $errors;
        }
        else if($name === 'Image'){
            $imageValidation = new ImageValidation();
            $errors = $imageValidation->checkImage($data);
            return $errors;
        }
        else if($name === 'Date'){
            $assemblyValidation = new DateValidation();
            $errors = $assemblyValidation->check($data);
            return $errors;
        }
        else if($name === 'Comment'){
            $CommentValidation = new CommentValidation();
            $errors = $CommentValidation->check($data);
            return $errors;
        }
        else if($name === 'Mail'){
            $mailValidation = new MailValidation();
            $errors = $mailValidation->check($data);
            return $errors;
        }
    }
}
