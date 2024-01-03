<?php

namespace Config\Alexis;
use Config\Alexis\Request;

class View{
    private $file;
    private $title;
    private $css;
    private $request;
    private $session;

    public function __construct() {
        $this->request = new Request();
        $this->session = $this->request->getSession();
    }

    public function render($template, $data = [], $fileTemplates = "template") {
        $this->file = '../view/' . $template . '.php';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../view/templates/' . $fileTemplates . '.php', [
            'title' => $this->title,
            'css' => $this->css,
            'content' => $content,
            'session' => $this->session
        ]);
        echo $view;
    }
    public function renderFile($file, $data) {
        if (file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location: index.php?route=notFound');
    }
}