<?php


namespace Makmiko\Project\Models;


use Makmiko\Project\Core\DBConnection;

class RealtyModel
{
    const PIC_UPLOAD_FAILED = "Загрузка картинок не удалась";
    const PIC_DELETE_FAILED = "Не удалось удалить файлы";
    const REALTY_ADD_SUCCESS = "Объект недвижимости добавлен в базу данных";
    const REALTY_ADD_FAILED = "Требуется добавить картинки";
    const REALTY_DELETE_SUCCESS = "Объект успешно удален";
    const REALTY_DELETE_FAILED = "Не удалось удалить объект";
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
    public function getRealtiesPics() {
        $query = "SELECT * FROM realty_pics";
        return $this->db->queryAll($query);
    }
    public function getRealtyPics($id) {
        $query = "SELECT name FROM realty_pics WHERE realty_id = :id";
        $params = [
            'id' => $id
        ];
        return $this->db->execute($query, $params, true);
    }
    public function getAllRealties($type) {
        $query = "SELECT * FROM realty WHERE type = :type;";
        $params = [
            'type'=>$type
        ];
        $realties = $this->db->execute($query, $params, true);
        return $realties;
    }
    public function getRealtyById($type, $id) {
        $query = "SELECT * FROM realty WHERE type = :type AND id = :id LIMIT 1;";
        $params = [
            'type'=>$type,
            'id'=>$id
        ];
        $realty = $this->db->execute($query, $params);
        return $realty;
    }
    public function getRealtiesByUser($login) {
        $id_query = "SELECT u.id FROM user u WHERE u.login = :login";
        $id = $this->db->execute($id_query, ['login' => $login], false);
        $realty_by_user_query = "SELECT * FROM realty INNER JOIN user_has_realty ON realty.id = user_has_realty.realty_id
        WHERE user_has_realty.user_id = :id";
        return $this->db->execute($realty_by_user_query, ['id'=>$id['id']], true);

    }
    public function deleteRealty ($id) {
        $pic_files = "SELECT name FROM realty_pics WHERE realty_id = :id";
        $user_query = "DELETE FROM user_has_realty WHERE realty_id = :id;";
        $pics_query = "DELETE FROM realty_pics WHERE realty_id = :id;";
        $realty_query = "DELETE FROM realty WHERE id = :id;";
        $params = [
            'id'=> $id
        ];
        $pics_to_unlink = $this->db->execute($pic_files, $params, true);
        try {
            foreach($pics_to_unlink as $unlink_pic) {
                unlink("static/imgs/".$unlink_pic["name"]);
            }
        } catch(Exception $e) {
            return self::PIC_DELETE_FAILED;
        }
        try{
            // начало транзакции
            $this->db->getConnection()
                ->beginTransaction();
            $this->db->executeSql($user_query, $params);
            $this->db->executeSql($pics_query, $params);
            $this->db->executeSql($realty_query, $params);
            // подтверждение транзакции
            $this->db->getConnection()->commit();
            return self::REALTY_DELETE_SUCCESS;
        } catch (Exception $e) { // Обработка ошибки
            // откат транзакции
            $this->db->getConnection()->rollBack();
            return self::REALTY_DELETE_FAILED;
        }

    }
    public function addRealty(array $realty, $login, array $pictures = []) {
        $name = $realty['name'];
        $address = $realty['address'];
        $price = $realty['price'];
        $type = $realty['type'];
        $rooms = $realty['rooms'];
        $area = $realty['area'];
        $description = $realty['description'];
        $user = $this->findUser($login);
        $pics_names = [];
        $realty_query = "INSERT INTO realty (`name`, `address`, `price`, `type`, `rooms`, `area`, `description`)
                         VALUES (:name, :address, :price, :type, :rooms, :area, :description)";
        $user_query = "INSERT INTO user_has_realty (`user_id`, `realty_id`) VALUES (:user_id, :realty_id)";
        $pics_query = "INSERT INTO realty_pics (`name`, `realty_id`) VALUES (:pic_name, :realty_id)";
        try {
            for($i = 0; $i < count($pictures['name']); $i++) {
                $ext = pathinfo($pictures['name'][$i], PATHINFO_EXTENSION);
                $file_name = md5(microtime()). '.' . $ext;
                $pics_names[] = $file_name; // функция хеширует строку и для одинаковых строк возвращает одинаковый хеш
                $tmp_name = $pictures['tmp_name'][$i];
                if (move_uploaded_file($tmp_name, "static/imgs/$file_name")) {
                } else {
                    return self::PIC_UPLOAD_FAILED;
                }
            }
            if (empty($pics_names)) {
                return self::PIC_UPLOAD_FAILED;
//                throw new \Exception('Необходимо добавить картинки');
            }
        } catch(Exception $e) {
            return self::PIC_UPLOAD_FAILED;
        }
        try{
            // начало транзакции
            $this->db->getConnection()
                ->beginTransaction();
            $realty_params = [
                'name'=>$name,
                'address'=>$address,
                'price'=>$price,
                'type'=>$type,
                'rooms'=>$rooms,
                'area'=>$area,
                'description'=>$description,
            ];
            $this->db->executeSql($realty_query, $realty_params);
            $realty_id = $this->db->getConnection()->lastInsertId();
            $user_params = [
                'user_id' => $user['id'],
                'realty_id'=>$realty_id
            ];
            $this->db->executeSql($user_query, $user_params);
            foreach ($pics_names as $pic) {
            $pics_params = [
                'pic_name' => $pic,
                'realty_id'=>$realty_id
            ];
            $this->db->executeSql($pics_query, $pics_params);
            }
            // подтверждение транзакции
            $this->db->getConnection()->commit();
            return self::REALTY_ADD_SUCCESS;
        } catch (Exception $e) { // Обработка ошибки
         // откат транзакции
            $this->db->getConnection()->rollBack();
            return self::REALTY_ADD_FAILED;
        }
    }
}