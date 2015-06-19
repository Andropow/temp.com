<?php

require_once dirname(__FILE__).'/../config/db.php';

class Mpage extends Db{
        
    function get_menu($visible = 1){
        $sql = "select `Id`,`menu_position`,`menu_name`,`visible` from tempdb.pages where "
                . "`visible` = '{$visible}' order by `menu_position`";
        if (!$visible){
            $sql = "select `Id`,`menu_position`,`menu_name`,`visible` from tempdb.pages"
                ." order by `menu_position`";
        }
        $res = $this->sql($sql);
        return $res;
    }
    
    function get_page($id){
        $sql = "select `Id`, `content`,`title`,`description`,`keywords`,`menu_name`"
                . ",`menu_position`,`visible` from tempdb.pages where `menu_position` = {$id}"
                . " limit 1";
        if(!$id){
            $sql = "select `Id`, `content`,`title`,`description`,`keywords` ,`menu_name`"
                . ",`menu_position`,`visible`from tempdb.pages order by `menu_position` asc"
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
                . ",'{$post['title']}','{$post['menu_name']}',{$post['menu_position']},'{$post['content']}',NOW(),"
                . "null,'{$post['visible']}',null)";     
        $this->pos_inc($post['menu_position']);
        return  $this->sql($sql) ? TRUE : FALSE;   
    }
    
    function update_page($post){  
        $sql = "UPDATE tempdb.pages SET `description`='{$post['description']}',`keywords`='{$post['keywords']}'"
        . ",`title`='{$post['title']}',`menu_name`='{$post['menu_name']}',`menu_position`={$post['menu_position']}"
        . ",`content`='{$post['content']}',`last_mod`=NOW(),`visible`='{$post['visible']}' WHERE `Id` = {$post['Id']}";
        return  $this->sql($sql) ? TRUE : FALSE;   
    }
    
    function menu_pos(){
        $sql = "select `menu_position`, `menu_name` from tempdb.pages order by `menu_position` asc";
        return $this->sql($sql);
    }
    
    function pos_inc($pos){
        $sql = "UPDATE tempdb.pages SET `menu_position` = `menu_position` + 1 where `menu_position` >= {$pos}";
        $this->sql($sql);
    }
    
    function delete_page($id){
        $sql = "delete from tempdb.pages where `menu_position` = {$id} limit 1";
        $this->sql($sql);
    }
    
    public function search($text){
        $sql = "select `Title`, `Article` from tempdb.articles where `Title` like '%{$text}%' or"
                ."`Article` like '%{$text}%'";
        $sql1 = "select `Title`, `Article` from tempdb.news where `Title` like '%{$text}%' or"
                ."`Article` like '%{$text}%'";        
        $res[] =  $this->sql($sql);
        $res[] =  $this->sql($sql1);
        return $res;
    }
}
