<?php
namespace App\config;
use Exception;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use App\src\controller\BackController;

class Router{
    private $frontController;
    private $errorController;
    private $backController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run(){
        $this->request->getSession()->set('test', 'value');
        $route = $this->request->getGet()->get('route');
        try{
            if (isset($route)){
                if($route === 'novel'){
                    $this->frontController->novel();
                }
                else if ($route  === 'article'){
                    $this->frontController->article($this->request->getGet()->get('id'));
                }
                else if($route === 'administration'){
                    $this->backController->administration();
                }
                else if($route === 'addArticle'){
                    $this->backController->addArticle($this->request->getPost());
                }
                else if($route === 'editArticle'){
                        $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('id'));
                }
                else if($route === 'deleteArticle'){
                    $this->backController->deleteArticle($this->request->getGet()->get('id'));
                }
                else if($route === 'addComment'){
                    $this->backController->addComment($this->request->getPost(), $this->request->getGet()->get('id'));
                }
                else if($route === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                }
                else if($route === 'flagComment'){
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'));
                }
                 else if($route === 'unflagComment'){
                    $this->backController->unflagComment($this->request->getGet()->get("commentId"));
                }
                else if($route === 'register'){
                    $this->frontController->register($this->request->getPost());
                }
                else if($route === 'login'){
                    $this->frontController->loginAuto();
                    $this->frontController->login($this->request->getPost());
                }
                else if($route === 'logout'){
                    $this->backController->logout();
                }
                else if($route === 'profile'){
                    $this->backController->profile();
                }
                else if($route === 'updatePassword'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                else if($route === 'deleteAccount'){
                    $this->backController->deleteAccount();
                }
                else if($route === 'deleteUser'){
                    $this->backController->deleteUser($this->request->getGet()->get('userId'));
                }
                else if ($route === 'mention'){
                    $this->frontController->mention();
                }
                else if ($route === 'acceptCookie'){
                    $this->frontController->acceptCookie();
                }
                else{
                    $this->errorController->errorNotFound();
                }

            }else{
                $this->frontController->home();
            }
        } catch (Exception $e) {
            $this->errorController->errorServer();
        }
    }
}



