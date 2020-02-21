<?php


namespace Makmiko\Project\Models;
use Makmiko\Project\Core\DBConnection;

class ArticleModel
{
    private $db;
    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }

    public function getAllArticles() {
        $sql = 'SELECT idarticle, title,
        article_text, created, login
        FROM article LEFT JOIN user ON
        article.user_iduser = user.iduser;';
        return $this->db->queryAll($sql);
    }
    public function getArticleById($id) {
        $sql = "SELECT idarticle, title,
        article_text, created, login
        FROM article LEFT JOIN user ON
        article.user_iduser = user.iduser
        WHERE idarticle = :id;";
        return $this->db->execute($sql,
            ['id'=>$id], false);
    }
}