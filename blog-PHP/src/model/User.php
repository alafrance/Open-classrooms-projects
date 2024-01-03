<?php

namespace App\src\model;

class User{
    private $id;
    private $pseudo;
    private $password;
    private $dateCreation;
    private $role;
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getPseudo(){
        return $this->pseudo;
    }
    
    public function setPseudo($pseudo){
         $this->pseudo = $pseudo;
    }
    
    public function getPassword(){
         return $this->password;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function getDateCreation(){
         return $this->dateCreation;
    }
    
    public function setDateCreation($dateCreation){
        $this->dateCreation = $dateCreation;
    }
    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
    }
}
