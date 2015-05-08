<?php

require_once dirname(__FILE__).'/../config/db.php';

class Mpage extends Db{
        
    function get_menu(){
        $sql = "select `Id`,`menu_position`,`menu_name`,`visible` from tempdb.pages where "
                . "`visible` = 1 order by `menu_position`";
        $res = $this->sql($sql);
        return $res;
    }
    
    function get_page($id){
        $sql = "select `content`,`title`,`description`,`keywords` from tempdb.pages where `menu_position` = {$id}"
                . " limit 1";
        if(!$id){
            $sql = "select `content`,`title`,`description`,`keywords` from tempdb.pages order by `menu_position` asc"
                . " limit 1";
        }
        $res = $this->sql($sql);
        return $res;
    }
            
    function get_content($id){
        $sql = "select `content` from tempdb.pages where `menu_position` = {$id}"
                . " limit 1";
       if(!$id){
            $sql = "select `content` from tempdb.pages order by `menu_position` asc"
                . " limit 1";
        }
        $res = $this->sql($sql);
        return $res;
    }
    
    function create_page($post){
        $sql = "INSERT INTO tempdb.pages (`Id`, `description`, `keywords`, `title`, "
                . "`menu_name`, `menu_position`, `content`, `created_date`, "
                . "`last_mod`, `visible`, `url`) VALUES (null,'{$post['description']}','{$post['keywords']}'"
                . ",'{$post['title']}','{$post['menu_name']}',{$post['menu_position']},'{$post['content']}',null,"
                . "null,{$post['visible']},null)";  
                
       return  $this->sql($sql) ? TRUE : FALSE;   
    }
}
