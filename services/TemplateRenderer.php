<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 26.02.17
 * Time: 15:55
 */
namespace app\services;
use app\lib\Twig;
class TemplateRenderer{

    protected $way = 'twig';

    public function render($template, $params = [], $className){

        switch ($this->getWay()){
            case 'custom':
                return $this->customWay($template, $params, $className);
                break;
            case 'twig':
                return $this->twigWay($template, $params, $className);
                break;
            default:
                return $this->customWay($template, $params, $className);
        }

    }

    protected function getWay(){
        return $this->way;
    }

    protected function customWay($template, $params = [], $className){

        $dir = '';
        if($template != 'layouts/main'){
            $dir = lcfirst(str_replace(['Controller', 'app\controllers\\'], '', $className));
        }
        $templatePath = $_SERVER['DOCUMENT_ROOT'] . "/../views/{$dir}/{$template}.php";
        extract($params);
        ob_start();
        include $templatePath;
        return ob_get_clean();

    }

    protected function twigWay($template, $params, $className){

        $loader = new Twig_Loader_Filesystem('templates');
        echo "<pre>";
        var_dump($loader);die();
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('countries2.tmpl');
        ob_start();
        echo $template->render(array (
            'data' => $data
        ));
        return ob_get_clean();


    }
}