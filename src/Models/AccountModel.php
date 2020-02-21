<?php


namespace Makmiko\Project\Models;

use Makmiko\Project\Core\DBConnection;

class AccountModel
{   const SUCCESS = "Авторизация прошла успешно";
    const ERROR = "Ошибка авторизации";
    const USER_EXISTS = 'Пользователь с таким логином уже существует';
    const REGISTRATION_FAILED = 'Вы не были зарегистрированы';
    const REGISTRATION_SUCCESS = 'Регистрация прошла успешно';
    private $db;
    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }

    private function findUser(string $login){
        $sql = 'SELECT * FROM user WHERE login = :login';
        $user = $this->db->execute($sql,
            ['login'=>$login], false);
        return $user;
    }
    public function authorisation(array $formData)
    {
        $login = $formData['login'];
        $pwd = $formData['pwd'];
        $user = $this->findUser($login);
        if(!$user) {
            return self::ERROR;
        }
        if(!password_verify($pwd, $user['password'])) {
            return self::ERROR;
        }
        return self::SUCCESS;
    }

    public function addUser(array $user_data){
        // проверка уникальности логина
        // password_hash();
        // добавление в таблицу user

        // добавление контактной информации
        //  в таблицу user_info
        $login = $user_data['login'];
        if ($this->findUser($login)) return self::USER_EXISTS;
        $pwd = $user_data['password'];
        $pwd = password_hash($pwd,
            PASSWORD_DEFAULT);
        $firstName = $user_data['firstName'];
        $lastName = $user_data['lastName'];
        $user_sql = "INSERT INTO user (login, password, firstName, lastName)
VALUES (:login, :pwd, :firstName, :lastName)";

        $user_info_sql = "INSERT INTO userinfo
(email, address, phone, user_id) VALUES (:email, :address, :phone, :id)";
        try{
            // начало транзакции
            $this->db->getConnection()
                ->beginTransaction();
            $user_params = [
                'login' => $login,
                'pwd'=>$pwd,
                'firstName'=>$firstName,
                'lastName'=>$lastName
            ];
            $this->db->executeSql($user_sql, $user_params);
            $info_params = [
                'email'=>$user_data['email'],
                'address'=>$user_data['address'],
                'phone'=>$user_data['phone'],
                'id'=> $this->db->getConnection()
                    ->lastInsertId()
            ];
            $this->db->executeSql($user_info_sql,
                $info_params);

            // подтверждение транзакции
            $this->db->getConnection()->commit();
            return self::REGISTRATION_SUCCESS;
        } catch (Exception $e) { // Обработка ошибки
//           // откат транзакции
            $this->db->getConnection()->rollBack();
            return self::REGISTRATION_FAILED;


        }
    }

}