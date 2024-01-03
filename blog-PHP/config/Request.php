<?php
namespace App\config;

class Request
{
    private $get;
    private $post;
    private $session;
    private $cookie;
    public function __construct()
    {
        $this->get = new Parameter($_GET);
        $this->post = new Parameter($_POST);
        $this->session = new Session($_SESSION);
        $this->cookie = new Cookie($_COOKIE);
    }
    
    public function getGet() {
        return $this->get;
    }
    
    public function getPost() {
        return $this->post;
    }
    
    public function getSession() {
        return $this->session;
    }
    public function getCookie(){
        return $this->cookie;
    }
}
