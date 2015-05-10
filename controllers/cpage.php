<?php

require_once dirname(__FILE__) . '/../models/mpage.php';

class Cpage extends Mpage {

    function get_menu($visible) {
        $res = parent::get_menu($visible); //return link on result query
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

    function get_content($id) {
        settype($id, 'integer');
        $res = parent::get_content($id);
        $row = $res->fetch_assoc();
        return $row['content'];
    }

    function create_page($post) {
        $post = Service::clean_data($post);
        return parent::create_page($post);
    }

    function update_page($post) {
        $post = Service::clean_data($post);
        $old_pos = $this->menu_pos()[$post['menu_name']];
        if ($old_pos != $post['menu_position']) {
            $this->pos_inc($post['menu_position']);
        }
        return parent::update_page($post);
    }

    function menu_pos($iscreate = 'update') {
        $res = parent::menu_pos();
        while ($row = $res->fetch_assoc()) {
            $menu[$row['menu_name']] = $row['menu_position'];
        }
        $count = count($menu) + 1;
        if ($iscreate == 'create') {
            $menu['In last position'] = $count;
        }
        return $menu;
    }

}
