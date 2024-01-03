<?php
namespace App\src\model;
class Date{
    private $id;
    private $title;
    private $place;
    private $content;
    private $date;
    private $image;
    public function getId(){
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setPlace($place) {
        $this->place = $place;
    }
    public function getPlace(){
        return $this->place;
    }

    public function getContent(){
        return $this->content;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }
}