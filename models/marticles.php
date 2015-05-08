<?php
require_once dirname(__FILE__).'/../config/db.php';

class Marticles extends Db {
    function get_articles(){
        $sql = "select `Title`, `Article` from tempdb.articles order by Id desc ";
        $res = $this->sql($sql);
        return $res;
    }
}
