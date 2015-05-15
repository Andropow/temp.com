<?php

require_once dirname(__FILE__) . '/../config/db.php';

class Marticles extends Db {

    protected function get_articles() {
        $sql = "select `Id`, `Title`, `Article` from tempdb.articles order by Id desc ";
        $res = $this->sql($sql);
        return $res;
    }

    protected function get_article($id) {
        $sql = "select `Id`, `Title`, `Article` from tempdb.articles where Id = {$id}"
                . " limit 1";
        $res = $this->sql($sql);
        return $res;
    }

    protected function list_articles() {
        $sql = "select `Id`, `Title` from tempdb.articles order by Id desc ";
        $res = $this->sql($sql);
        return $res;
    }

    protected function create_article($post) {
        $sql = "INSERT INTO tempdb.articles(`Id`, `Title`, `Article`) VALUES"
                . " (null,'{$post['title']}','{$post['article']}')";
        $this->sql($sql);
    }

    protected function update_article($post) {
        $sql = "UPDATE  tempdb.articles SET `Title`='{$post['title']}',`Article`='{$post['article']}'"
                . " where `Id` = {$post['id']}";
        $this->sql($sql);
    }

    protected function delete_article($id) {
        $sql = "DELETE FROM  tempdb.articles WHERE `Id` = {$id}";
        $this->sql($sql);
    }

}
