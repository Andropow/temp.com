<?php

require_once dirname(__FILE__) . '/../controllers/cpage.php';

class Vpage extends Cpage {

    function get_menu() {
        $vmenu = parent::get_menu(1);
        foreach ($vmenu as $uri => $link) {
            echo "<a href=\"?id={$uri}\">{$link}</a>";
        }
    }

    function list_pages() {
        $vmenu = parent::get_menu(0);
        echo '<ul class="listpage">';
        foreach ($vmenu as $uri => $link) {
            echo "<li><a href=\"?id={$uri}\">{$link}</a></li>";
        }
        echo '<ul/>';
    }

    function get_page($id) {
        $res = parent::get_page($id);
        return $res;
    }

    function get_content($id) {
        settype($id, 'integer');
        $res = parent::get_content($id);
        echo $res;
        if (!$id || $id == 1) {
            require_once dirname(__FILE__) . "/../views/varticles.php";
        }
    }

}
