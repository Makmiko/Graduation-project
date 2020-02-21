<?php
namespace Makmiko\Project\Controllers;

use Makmiko\Project\Core\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $content = 'main/main.php';
        $data = [
            'page_title'=>'Главная'
        ];
        return $this->generateResponse($content, $data);
    }
}