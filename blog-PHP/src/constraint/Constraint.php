<?php
namespace App\src\constraint;

class Constraint{
    public function notBlank($name, $value){
        if (empty($value)){
            return '<p class="alert alert-danger center">Le champ ' . $name . ' saisi est vide</p>';
        }
    }
    public function notBlankImage($name){
        if (!isset($_FILES[$name]) &&  $_FILES[$name]['error'] == 4){
            return '<p class="alert alert-danger center">Aucune image a été saisi</p>';
        }
    }
    public function notErrorImage($name){
        if ($_FILES[$name]['error'] != 0){
            return '<p class="alert alert-danger center">Erreur envoi fichier</p>';

        }
    }
    public function extensionAutorize($name){
        $infosfichier = pathinfo($_FILES[$name]['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (!in_array($extension_upload, $extensions_autorisees)){
             return '<p class="alert alert-danger center">Cette extension n\'est pas autorisé</p>';
        }
    }
    public function sizeImage($name){
        if ($_FILES[$name]['size'] >= 1000000){
            return '<p class="alert alert-danger center">Le </p>';
        }
    }
    public function minLength($name, $value, $minSize){
        if (strlen($value) < $minSize){
            return '<p class="alert alert-danger center">Le champ ' . $name . ' doit contenir au moins ' . $minSize . ' caractères</p>';
        }
    }
    public function maxLength($name, $value, $maxSize){
        if (strlen($value) > $maxSize){
            return '<p class="alert alert-danger center">Le champ ' . $name . ' doit contenir au maximun ' . $maxSize . ' caractères</p>';
        }
    }
    public function regexPassword($value){
        if (!(preg_match('#[A-Z]+#', $value) && preg_match('#[0-9]+#', $value) && preg_match('#.{8,}#', $value))){
            return '<p class="alert alert-danger center">Le mot de passe doit comporter au moins 8 caractères, et un caractère spécial et une majuscule</p>'; 
        }
    }
    public function regexEmail($value){
        if (!(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $value))){
            return '<p class="alert alert-danger center">L\'email n\'est pas valide';
        }
    }

}
