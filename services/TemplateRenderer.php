<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 26.02.17
 * Time: 15:55
 */

namespace app\services;
use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer {

    public function render($template, $params = [], $className){

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

}