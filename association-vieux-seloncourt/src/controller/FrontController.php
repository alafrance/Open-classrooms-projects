<?php

namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use Config\Alexis\View;
use Config\Alexis\Parameter;
class FrontController extends Controller{
    public function home(){
        $articles = $this->articleDAO->getArticles();
        $articles = array_chunk($articles, 3)[0];
        $exposition = $this->articleDAO->getLastExposition();
        $date = $this->articleDAO->getDate();
        return $this->view->render('home', [
            'articles' => $articles,
            'date' => $date,
            'exposition' => $exposition
        ], "home");
    }
    public function rgpd(){
        return $this->view->render('rgpd');
    }
    public function contact(Parameter $post){
        if ($post->get("submit")){
            $errors = $this->validation->validate($post, 'Mail');
            if ($post->get('rgpd') != 'on'){
                $errors['rgpd'] = '<p class="alert alert-danger center">Vous devez accepter les conditions d\'utilisations</p>';
            }
            if (!$errors){
                mail("alexislafrances-laf@outlook.fr", "Mail de " . $post->get('firstName') . ' ' . $post->get('lastName'), $post->get("content") . "\n" . 'Mail :' . $post->get("email"));
                $this->session->set('send_mail', 'Votre message a bien été envoyé');
            }
         return $this->view->render('contact', ['errors' => $errors]);
        }
        return $this->view->render('contact');
    }
    public function articles(){
        $articles = $this->articleDAO->getArticles();
        $categories = $this->articleDAO->getCategories();
        return $this->view->render('articles', [
           'articles' => $articles,
            'categories' => $categories,
        ]);
    }
    public function articlesCategory($categoryId){
        $articles = $this->articleDAO->getArticlesFromCategory($categoryId);
        $category = $this->articleDAO->getCategory($categoryId);
        $categories = $this->articleDAO->getCategories();

        return $this->view->render('category', [
            'articles' => $articles,
            'category' => $category,
            'categories' => $categories
        ]);
    }
    public function article($id){
        $article = $this->articleDAO->getArticle($id);
        $comments = $this->commentDAO->getCommentsFromArticle($id);
        return $this->view->render('article', [
          'article' => $article,
          'comments' => $comments,
          'articleId' => $id
        ]);
    }
    public function login(Parameter $post){
        if ($post->get('submit')){
            $result  = $this->userDAO->login($post);
            if ($result && $result['isPasswordValid']){
                if ($post->get('auto')){
                    $this->cookie->set('pseudo', $post->get('pseudo'));
                    $this->cookie->set('password', $result['result']['password']);
                }
                $this->session->set('login', 'Vous êtes connecté');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['role_name']);
                $this->session->set('name', $result['result']['name']);
                $this->session->set('email', $post->get('email'));
                header('Location: index.php?route=profile');
            }
            else{
                $this->session->set('error_login', 'Le pseudo ou le mot de passe est incorrect');
               return $this->view->render('login', [
                    'post' => $post
                   ]);
            }
        }else{
            return $this->view->render('login');
        }
    }
    public function register(Parameter $post){
        if ($post->get('submit')){
            $errors = $this->validation->validate($post, 'User');
            if($this->userDAO->checkEmail($post)) {
                $errors['email'] = $this->userDAO->checkEmail($post);
            }
            if ($post->get('password') != $post->get('password2')){
                $errors['password2'] = '<p class="alert alert-danger">Les deux mots de passe ne correspondent pas</p>';
            }
            if (!$errors){
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectué');
                $this->login($post);
                header('Location: index.php?route=profile');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }
    public function flagComment($commentId){
        $this->commentDAO->flagComment($commentId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header("Location: ../public/index.php");
    }
}