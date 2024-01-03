<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\config\View;
use App\src\DAO\CommentDAO;
use App\src\DAO\UserDAO;

use App\src\constraint\Validation;

use App\config\Request;

abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
    protected  $userDAO;
    protected    $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $cookie;
    public function __construct(){
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
        $this->cookie = $this->request->getCookie();
    }
}