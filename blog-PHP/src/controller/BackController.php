<?php
namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\config\View;
use App\config\Parameter;

class BackController extends Controller
{
    private function checkLoggedIn(){
        if (!($this->session->get('pseudo'))){
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?route=login');
        }else{
            return true;
        }
    }
    private function checkAdmin(){
        $this->checkLoggedIn();
        if (!($this->session->get('role') == 'admin')){
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ../public/index.php?route=profile');
        }else{
            return true;
        }
    }
    public function administration(){
        if ($this->checkAdmin()){
            $articles = $this->articleDAO->getArticles();
            $comments = $this->commentDAO->getFlagComments();
            $users = $this->userDAO->getUsers();
            return $this->view->render('administration/administration', [
                'articles' => $articles,
                'comments' => $comments,
                'users' => $users
            ]);
        }
    }
    public function upload_image($name){
        move_uploaded_file($_FILES['image']['tmp_name'], '../public/img/blog/' . basename($_FILES['image']['name']));
        return basename($_FILES['image']['name']);
    }
    public function addArticle(Parameter $post)
    {
         if ($this->checkAdmin()){
            if($post->get('submit')) {
                // On gère les erreurs
               $errors = $this->validation->validate($post, 'Article');
               if ($this->articleDAO->checkNumberChapter($post)){
                   $errors['numberChapter'] = $this->articleDAO->checkNumberChapter($post);
               }
               if ($this->validation->validate('image', 'Image')){
                   $errors['image'] = $this->validation->validate('image', 'Image');
               }
               // On envoie sur le serveur
               if(!$errors) {
                   $image = $this->upload_image('image');
                   $this->articleDAO->addArticle($post, $image);
                   $this->session->set('add_article', 'Le nouvel article a bien été ajouté');
                   header('Location: ../public/index.php?route=administration');
               }
               return $this->view->renderTemplate('administration/add_article', [
                   'post' => $post,
                   'errors' => $errors
               ], 'tinymce');
            }
            return $this->view->renderTemplate('administration/add_article', [], 'tinymce');
         }

    }
    public function editArticle(Parameter $post, $articleId)
    {
        if ($this->checkAdmin()){
            $article = $this->articleDAO->getArticle($articleId);
            if($post->get('submit')) {
                // On gère les erreurs
                $errors = $this->validation->validate($post, 'Article');

               // On envoie sur le serveur
                if (!$errors){
                    $this->articleDAO->editArticle($post,  $articleId);
                    $this->session->set('edit_article', 'L\' article a bien été modifié');
                    header('Location: ../public/index.php?route=administration');
                }
            }

            $post->set('id', $article->getId());
            $post->set('title', $article->getTitle());
            $post->set('content', $article->getContent());
            $post->set('numberChapter', $article->getNumberChapter());

            return $this->view->renderTemplate('administration/edit_article', [
                'post' => $post
            ], 'tinymce');
        }
    }
   public function deleteArticle($articleId)
    {
       if ($this->checkAdmin()){
            $this->articleDAO->deleteArticle($articleId);
            $this->session->set('delete_article', 'L\' article a bien été supprimé');
            header('Location: ../public/index.php?route=administration');
       }
    }
    public function deleteAccount(){
        if ($this->checkAdmin()){
            $this->userDAO->deleteAccount($this->session->get('pseudo'));
            $this->logoutOrDelete('delete_account');
        }
    }
    public function deleteUser($userId){
        if ($this->checkAdmin()){
            $this->userDAO->deleteUser($userId);
            $this->session->set('delete_user', 'L\'utilisateur a été supprimé');
            header('Location: ../public/index.php?route=administration');
        }
    }
    public function addComment($post, $articleId){
        if ($this->checkLoggedIn()){
            if ($post->get('submit')){
                $errors = $this->validation->validate($post, 'Comment');
                if (!$errors){
                    $this->commentDAO->addComment($post, $articleId, $this->session->get('pseudo'));
                    $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
                    header('Location: ../public/index.php?route=article&id=' .  $articleId);
                }
                $article = $this->articleDAO->getArticle($articleId);
                $comments = $this->commentDAO->getCommentsFromArticle($articleId);
                return $this->view->render('single', [
                    'article' => $article,
                    'comments' => $comments,
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
        }
    }
    public function deleteComment($commentId){
        if ($this->checkAdmin()){
            $this->commentDAO->deleteComment($commentId);
            $this->session->set('delete_article', 'Le commentaire a été supprimé');
            header('Location: ../public/index.php?route=administration');
        }
    }
    public function unflagComment($commentId){
        if ($this->checkAdmin()){
            $this->commentDAO->unflagComment($commentId);
            $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
            header('Location: ../public/index.php?route=administration');
        }
    }
    public function profile(){
        if ($this->checkLoggedIn()){
            return $this->view->render('profile');
        }
    }
    public function updatePassword(Parameter $post){
        if ($this->checkLoggedIn()){
            $errors = [];
            if($post->get('submit')) {
                $errors = $this->validation->validate($post , 'User');
                if (!$this->userDAO->isPasswordValid($this->session->get('pseudo'), $post->get('oldpassword'))){
                    $errors['isPasswordValid'] = 'L\'ancien mot de passe est faux';
                }
                if ($post->get('password') != $post->get('password2')){
                    $errors['passwordEgal'] = "Les deux mots de passe ne correspondent pas";
                }
                if (!$errors){
                    $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
                    $this->session->set('update_password', 'Le mot de passe a été mis à jour');
                    header('Location: ../public/index.php?route=profile');
                }
            }
            return $this->view->render('administration/update_password', [
                'errors' => $errors
            ]);
        }
    }
    public function logout(){
        if ($this->checkLoggedIn()){
            $this->logoutOrDelete('logout');
            $this->cookie->remove('pseudo');
            $this->cookie->remove('password');
        }
    }

    private function logoutOrDelete($param)
    {
        if ($this->checkLoggedIn()){
            $this->session->stop();
            $this->session->start();
            if($param === 'logout') {
                $this->session->set($param, 'À bientôt');
            } else {
                $this->session->set($param, 'Votre compte a bien été supprimé');
            }
            header('Location: ../public/index.php');
        }
    }

}