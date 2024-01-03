<?php
namespace App\src\constraint;

class Constraint{
    public function notBlank($name, $value){
        if (empty($value)){
            return '<p class="alert alert-danger center">Le champ ' . $name . ' saisi est vide</p>';
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
        if (!(preg_match('#[A-Z]+#', $value) && preg_match('#.{8,}#', $value))){
            return '<p class="alert alert-danger center">Le mot de passe doit comporter au moins 8 caractères et une majuscule</p>'; 
        }
    }
    public function regexEmail($value){
        if (!(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $value))){
            return '<p class="alert alert-danger center">L\'email n\'est pas valide</p>';
        }
    }
    public function notBlankImage($name){
        if (isset($_FILES[$name]['error']) && $_FILES[$name]['error'] == '4' ){
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
        if ($_FILES[$name]['size'] >= 7000000){ // Taille max 7 mo (Php accepte jusqu'a 8 mo)
            return '<p class="alert alert-danger center">L\'image est trop grande. Veuillez réessayer. </p>';
        }
    }
    public function isNumber($name, $value){
        if (!is_numeric($value)){
            return '<p class="alert alert-danger center">Le champ ' . $name . ' n\'est pas un chiffre</p>';
        }
    }
    public function isHours($name, $value){
        if (intval($value) < 0 || intval($value) > 24){
            return '<p class="alert alert-danger center">Le champ ' . $name . ' n\'est pas une heure valide</p>';
        }
    }
    public function isMinutes($name, $value){
        if (intval($value) < 0 || intval($value) > 60){
            return '<p class="alert alert-danger center">Le champ ' . $name . ' n\'est pas une minute valide</p>';
        }
    }
}
