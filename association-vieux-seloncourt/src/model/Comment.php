<?php

namespace App\src\model;
class Comment {
    private $id;
    private $content;
    private $pseudo;
    private $article_id;
    private $date;
    private $flag;
    public function getId(){
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
     public function getContent(){
        return $this->content;
    }
    public function setContent($id) {
        $this->content = $id;
    }
     public function getName(){
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getArticle_id(){
        return $this->article_id;
    }
    public function setArticle_id($article_id) {
        $this->article_id = $article_id;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function isFlag()
    {
        return $this->flag;
    }
    public function setFlag($flag){
        $this->flag = $flag;
    }

    
}

