<?php
namespace Config\Alexis;

use Exception;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use App\src\controller\BackController;

class Router{
    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct() {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
        $this->request = new Request();
    }
    public function run(){
        $route = $this->request->getGet()->get('route');
        try{
            if ($route != NULL){
                switch($route){
                    case 'contact':
                        $this->frontController->contact($this->request->getPost());
                        break;
                    case 'login':
                        $this->frontController->login($this->request->getPost());
                        break;
                    case 'register':
                        $this->frontController->register($this->request->getPost());
                        break;
                    case 'profile':
                        $this->backController->profile($this->request->getPost());
                        break;
                    case 'setting':
                        $this->backController->setting();
                        break;
                    case 'updatePassword':
                        $this->backController->updatePassword($this->request->getPost());
                        break;
                    case 'updateName':
                        $this->backController->updateName($this->request->getPost());
                        break;
                    case 'updateEmail':
                        $this->backController->updateEmail($this->request->getPost());
                        break;
                    case 'deleteAccount':
                        $this->backController->deleteAccount($this->request->getPost());
                        break;
                    case 'home':
                        $this->frontController->home();
                        break;
                    case 'rgpd':
                        $this->frontController->rgpd();
                        break;
                    case 'logout':
                        $this->backController->logout();
                        break;
                    case 'articles':
                        $this->frontController->articles();
                        break;
                    case 'article':
                        $this->frontController->article($this->request->getGet()->get('id'));
                        break;
                    case 'category':
                        $this->frontController->articlesCategory($this->request->getGet()->get('id'));
                        break;
                    case 'addArticle':
                        $this->backController->addArticle($this->request->getPost());
                        break;
                    case 'addDate':
                        $this->backController->addDate($this->request->getPost());
                        break;
                    case 'deleteDate':
                        $this->backController->deleteDate($this->request->getPost());
                        break;
                    case 'addExposition':
                        $this->backController->addExposition($this->request->getPost());
                        break;
                    case 'editArticle':
                        $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('id'));
                        break;
                    case 'editImageArticle':
                        $this->backController->editImageArticle($this->request->getPost(), $this->request->getGet()->get('id'));
                        break;
                    case 'deleteArticle':
                        $this->backController->deleteArticle($this->request->getPost(), $this->request->getGet()->get('id'));
                        break;
                    case 'addComment':
                        $this->backController->addComment($this->request->getPost(), $this->request->getGet()->get('articleId'));
                        break;
                    case 'addCategory':
                        $this->backController->addCategory($this->request->getPost());
                        break;
                    case 'deleteCategory':
                        $this->backController->deleteCategory($this->request->getPost(), $this->request->getGet()->get('categoryId'));
                        break;
                    case 'flagComment':
                        $this->frontController->flagComment($this->request->getGet()->get('commentId'));
                        break;
                    case 'unflagComment':
                        $this->backController->unflagComment($this->request->getGet()->get('commentId'));
                        break;
                    case 'deleteComment':
                        $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                        break;
                    case 'rightAuthor':
                        $this->backController->changeAuthor($this->request->getPost(), $this->request->getGet()->get('userId'));
                        break;
                    case 'rightUser':
                        $this->backController->changeUser($this->request->getPost(), $this->request->getGet()->get('userId'));
                        break;
                    default:
                        $this->errorController->errorNotFound();
                        break;
                }
            }else{
                $this->frontController->home();
            }
        }catch(Exception $e){
            echo $e->getMessage();
            //$this->errorController->errorServer();
        }
    }
}
