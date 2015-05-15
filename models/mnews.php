<?php
require_once dirname(__FILE__).'/../config/db.php';

class Mnews extends Db {
    protected function get_all_news(){
        $sql = "select `Id`, `Title`, `Article` from tempdb.news order by Id desc ";
        $res = $this->sql($sql);
        return $res;
    }
    
    protected function get_news($id){
        $sql = "select `Id`, `Title`, `Article` from tempdb.news where Id = {$id}"
            . " limit 1";
        $res = $this->sql($sql);
        return $res;
    }

        protected function list_news(){
        $sql = "select `Id`, `Title` from tempdb.news order by Id desc ";
        $res = $this->sql($sql);
        return $res;
    }
    
    protected function create_news($post){
        $sql = "INSERT INTO tempdb.news(`Id`, `Title`, `Article`) VALUES"
                . " (null,'{$post['title']}','{$post['article']}')";
        $this->sql($sql);
    }
    
     protected function update_news($post){
        $sql = "UPDATE  tempdb.news SET `Title`='{$post['title']}',`Article`='{$post['article']}'"
                . " where `Id` = {$post['id']}";
        $this->sql($sql);
    }
    
     protected function delete_news($id){
        $sql = "DELETE FROM  tempdb.news WHERE `Id` = {$id}";
        $this->sql($sql);
    }
    
}
