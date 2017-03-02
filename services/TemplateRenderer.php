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

    public function render($template, $params = []){

        $templatePath = $_SERVER['DOCUMENT_ROOT'] . "/../views/{$template}.php";
        extract($params);
        ob_start();
        include $templatePath;
        return ob_get_clean();

    }

}