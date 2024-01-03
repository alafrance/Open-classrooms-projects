<?php
namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\config\View;

use App\config\Parameter;
class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home',  ['articles' => $articles]);
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render('single', ['article' => $article, 'comments' => $comments]);
    }

    public function flagComment($commentId){
        $this->commentDAO->flagComment($commentId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header("Location: ../public/index.php");
    }
    public function register(Parameter $post){
        if ($post->get('submit')){
            $errors = $this->validation->validate($post, 'User');
            if($this->userDAO->checkUser($post)) {
                $errors['pseudo'] = $this->userDAO->checkUser($post);
            }
            if ($post->get('password') != $post->get('password2')){
                $errors['password2'] = '<p class="alert alert-danger">Les deux mots de passe ne correspondent pas</p>';
            }
            if (!$errors){
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectué');
                $this->login($post);
                header('Location: ../public/index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }
    public function loginAuto(){
        if ($this->cookie->get('pseudo') && $this->cookie->get('password')){
                $request = $this->userDAO->loginAuto($this->cookie->get('pseudo'), $this->cookie->get('password'));
        }
        if (isset($request) && $request['isPasswordValid']){
            $this->session->set('login', 'Content de vous vous voir');
            $this->session->set('role', $request['result']['name']);
            $this->session->set('pseudo', $this->cookie->get('pseudo'));
            header('Location: ../public/index.php');
        }
    }
    public function login(Parameter $post){
        if ($post->get('submit')){
            $result = $this->userDAO->login($post);
        if ($result && $result['isPasswordValid']){
                if ($post->get('auto')){
                    $this->cookie->set('pseudo', $post->get('pseudo'));
                    $this->cookie->set('password', $result['result']['password']);
                }
                $this->session->set('login', 'Content de vous voir');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo', $post->get('pseudo'));
                header('Location: ../public/index.php');
            }
            else{
                $this->session->set('error_login', 'Le pseudo ou le mot de passe est incorrecte');
               return $this->view->render('login', [
                    'post' => $post
                   ]);
            }
        }else{
            return $this->view->render('login');
        }
    }
    public function novel(){
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('novel', [
            'articles' => $articles
        ]);
    }
    public function mention(){
        return $this->view->render('mention');
    }
    public function acceptCookie(){
        $this->cookie->set('acceptCookie', 'true');
        $articles = $this->articleDAO->getArticles();
        header("Location: index.php");
    }

}

