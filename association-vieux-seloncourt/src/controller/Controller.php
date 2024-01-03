<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use Config\Alexis\View;
use App\src\DAO\CommentDAO;
use App\src\DAO\UserDAO;

use App\src\constraint\Validation;

use Config\Alexis\Request;

abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
    protected $userDAO;
    protected $view;
    private $request;
    protected $validation;
    protected $get;
    protected $post;
    protected $session;
    protected $cookie;
    public function __construct(){
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->request = new Request();
        $this->validation = new Validation();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
        $this->cookie = $this->request->getCookie();
    }
}