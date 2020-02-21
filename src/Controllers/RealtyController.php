<?php


namespace Makmiko\Project\Controllers;


use Makmiko\Project\Core\Controller;
use Makmiko\Project\Core\Request;
use Makmiko\Project\Models\RealtyModel;

class RealtyController extends Controller
{
    private $realties_model;
    public function __construct()
    {
        $this->realties_model = new RealtyModel();
    }
    public function showRealties(Request $r) {
        if ($r->params() != null) {
        $type = $r->params()['typeOfRealty'];
        } else {
            $type = null;
        }
        if ($type === 'primary') {
            $page_title = "Новостройки";
        } elseif ($type === 'assignment') {
            $page_title = "Переуступки";
        } elseif ($type === 'commercial') {
            $page_title = "Коммерция";
        } elseif ($type == null) {
            $page_title = 'Новостройки';
            $type = 'primary';
        } else {
            header("Location: /page_not_found");
        }
        $realties = $this->realties_model->getAllRealties($type);
        $pics = $this->realties_model->getRealtiesPics();
        $content = "realty/realties.php";
        $data = [
            'page_title' => $page_title,
            'realties'=> $realties,
            'pics' => $pics
        ];
        return $this->generateResponse($content, $data);
    }

    public function showRealty(Request $r){
        $type = $r->params()['realtyType'];
        $id = $r->params()['id'];
        $realties = $this->realties_model->getRealtyById($type, $id);
        if ($realties == null) {
            header('Location: /page_not_found');
        }
        $realty = $realties[0];
        $pics = $this->realties_model->getRealtyPics($realty['id']);
        $content = "realty/realty.php";
        $data = [
            'page_title' => $realty['name'],
            'realty'=> $realty,
            'pics' => $pics
        ];
        return $this->generateResponse($content, $data);
    }
    public function addRealty(Request $r) {
        $realty = $r->post();
        $pictures = $r->files()['pictures'];
//        var_dump($pictures);
        $login = $_SESSION['login'];
        $result = $this->realties_model->addRealty($realty, $login, $pictures);
        $realties = $this->realties_model->getRealtiesByUser($login);
        $pics = $this->realties_model->getRealtiesPics();
        $content = "account/account.php";
        $data = [
            'page_title' => 'Личный кабинет',
            'result' => $result,
            'realties' => $realties,
            'pics' => $pics
        ];
        return $this->generateResponse($content, $data);
    }
    public function deleteRealty(Request $r) {
        $realty_id = $r->params()['id'];
        $login = $_SESSION['login'];
        $result = $this->realties_model->deleteRealty($realty_id);
        $realties = $this->realties_model->getRealtiesByUser($login);
        $pics = $this->realties_model->getRealtiesPics();
        $content = "account/account.php";
        $data = [
            'page_title' => 'Личный кабинет',
            'result' => $result,
            'realties' => $realties,
            'pics' => $pics
        ];
        return $this->generateResponse($content, $data);
    }
}