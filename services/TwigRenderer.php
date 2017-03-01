<?php

namespace app\services;
use app\interfaces\IRenderer;
use Twig_Loader_Filesystem;

class TwigRenderer implements IRenderer {

    protected $templateDir;
    protected $templater;

    public function __construct(){
        //$this->templateDir = $_SERVER['DOCUMENT_ROOT'] . "/../views";
        $this->templateDir = "/Applications/XAMPP/xamppfiles/htdocs/php22.com/views/product/";
        $loader = new Twig_Loader_Filesystem($this->templateDir);
        $this->templater = new \Twig_Environment($loader);
    }

    public function render($template, $params){
        $template = "{$template}.twig";
        $template = $this->templater->loadTemplate($template);
        return $template->render($params);
    }
}