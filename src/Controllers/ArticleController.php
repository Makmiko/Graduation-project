<?php
namespace Makmiko\Project\Controllers;

use Makmiko\Project\Core\Controller;
use Makmiko\Project\Core\DBConnection;
use Makmiko\Project\Core\Request;
use Makmiko\Project\Models\ArticleModel;

class ArticleController extends Controller
{
    private $article_model;
    private $db_connection;
    public function __construct()
    {
        $this->db_connection =
            DBConnection::getInstance();
        $this->article_model = new ArticleModel();
//        $this->books_model = new BooksModel();
    }


    public function indexAction(){
        $content = 'main/main.php';
        $articles = $this->article_model
            ->getAllArticles();
//        $books = $this->books_model->getAllBooks();
        $data = [
            'page_title'=>'Статьи',
            'all_articles'=>$articles
        ];

        return $this->generateResponse($content, $data);
    }

    public function showAction(Request $request) {
        $id = $request->params()['id'];
        $content = 'articles/article.php';
        $article = $this->article_model
            ->getArticleById($id);
//        $book = $this->books_model->getById($id);
        $data = [
            'page_title' => $article['title'],
            'article'=>$article,
        ];
        return $this->generateResponse($content, $data);
    }

    public function addAction(Request $request){
        $data = $request->post();
        $sql = "INSERT INTO article (title, article_text, user_iduser)
 VALUES ( :title, :text, :user_iduser)";
        $params = [
            "title" => $data['title'],
            "text" => $data['text'],
            "user_iduser" => 1
        ];
        $this->db_connection->executeSql($sql, $params);
        header('Location:/account');
    }
}


