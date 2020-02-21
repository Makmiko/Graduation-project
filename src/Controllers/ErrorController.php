<?php


namespace Makmiko\Project\Controllers;


use Makmiko\Project\Core\Controller;

class ErrorController extends Controller
{
    public function page404() {
        $content = null;
        $data = [];
        $template = 'page_not_found.php';
        return $this->generateResponse($content, $data, $template);
    }

}