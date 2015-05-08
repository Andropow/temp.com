<?php

require_once dirname(__FILE__).'/../models/mpage.php';

class Cpage extends Mpage{
    
    function get_menu(){
        $res = parent::get_menu(); //return link on result query
        while ($row = $res->fetch_assoc()) {
            $menu[$row['menu_position']] = $row['menu_name']; //forming array in result query
        }
        return $menu;
    }
    
    function get_page($id) {
        settype($id, 'integer');
        $res = parent::get_page($id);
        $row = $res->fetch_assoc();
        return $row;
    }
            
    function get_content($id){
        settype($id, 'integer');
        $res = parent::get_content($id);
        $row = $res->fetch_assoc();
        return $row['content'];
    }  
    
    function create_page($post) {
        $res = parent::create_page($post);
        return $res;   
    }
}








