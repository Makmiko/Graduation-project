<?php
namespace Makmiko\Project\Models;

class BooksModel
{
    public function getAllBooks(){
        return [
            [
                'id'=>1,
                'title'=>'PHP',
                'description'=>'Описание PHP',
                'page_count'=>127
            ],
            [
                'id'=>2,
                'title'=>'JS',
                'description'=>'Описание JS',
                'page_count'=>78
            ],
            [
                'id'=>3,
                'title'=>'HTML',
                'description'=>'Описание HTML',
                'page_count'=>341
            ],
            [
                'id'=>4,
                'title'=>'Базы Данных',
                'description'=>'Описание Базы Данных',
                'page_count'=>721
            ],
        ];
    }
    public function getById($id){
        return $this->getAllBooks()[$id-1];
    }
}