<?php
namespace App\src\model;
class Article{
    private $id;
    private $author;
    private $title;
    private $content;
    private $category;
    private $image;
    private $numberChapter;
    private $date;
    public function getId(){
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor($author) {
        $this->author = $author;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getContent(){
        return $this->content;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category) {
        $this->category = $category;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date) {
        $this->date = $date;
    }
}

