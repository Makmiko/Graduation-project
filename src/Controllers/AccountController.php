<?php


namespace Makmiko\Project\Controllers;

use Makmiko\Project\Core\Controller;
use Makmiko\Project\Core\Request;
use Makmiko\Project\Models\AccountModel;
use Makmiko\Project\Models\RealtyModel;

class AccountController extends Controller
{
    private $account_model;
    private $realties_model;
    public function __construct()
    {
        $this->account_model = new AccountModel();
        $this->realties_model = new RealtyModel();
    }

    public function regUser() {
        $content = 'account/registration.php';
        $data = [
            'page_title'=>'Зарегистрироваться'
        ];
        return $this->generateResponse($content, $data);
    }

    public function userAccount(){
        if(!isset($_SESSION['login'])) {
            header('Location: /');
        }
        $realties = $this->realties_model->getRealtiesByUser($_SESSION['login']);
        $pics = $this->realties_model->getRealtiesPics();
        $content = 'account/account.php';
        $data = [
            'page_title'=>'Личный кабинет',
            'realties' => $realties,
            'pics' => $pics
        ];
        return $this->generateResponse($content, $data);
    }

    public function addUser(Request $request){
        $result = $this->account_model
            ->addUser($request->post());
        $content = 'account/registration.php';
        $data = [
            'page_title'=>'Зарегистрироваться',
            'result' => $result
        ];
        return $this->generateResponse($content, $data);
    }
    public function login(Request $request) {
        $formData = $request->post();
        $result = $this->account_model->authorisation($formData);
        if ($result === AccountModel::SUCCESS) {
            $_SESSION['login'] = $formData['login'];
        }
        return $this->ajaxResponse($result);

    }

    public function logout() {
        unset($_SESSION['login']);
        $_SESSION = [];
        session_destroy();
        header('Location: /realty/primary');
    }
}