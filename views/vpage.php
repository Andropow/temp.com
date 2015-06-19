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
        echo '<ul >';
        foreach ($vmenu as $uri => $link) {
            echo "\n<li><a class='del' href=\"\"><img src='../img/del.ico' alt='{$uri}'/></a><a href=\"?id={$uri}\">{$link}</a></li>";
        }
        echo '</ul>';
    }

    function get_page($id) {
        $res = parent::get_page($id);
        return $res;
    }

    function get_content($id) {
        settype($id, 'integer');
        $res = parent::get_content($id);
        echo $res;
    }
    
    function menu_pos($iscreate, $selected) {
        $res = parent::menu_pos($iscreate);
        $count = count($res);
        foreach ($res as $name => $pos) {
            if ($iscreate == 'Create'){
                $sel = $pos == $count ? 'selected' : null;
                echo "<option value=\"{$pos}\" {$sel}>{$pos} - {$name}</option>\n";
            }else{
                $sel = $pos == $selected ? 'selected' : null;
                echo "<option value=\"{$pos}\" {$sel}>{$pos} - {$name}</option>\n";
            }
        }
    }
    
    function search($text) {
        $res = parent::search($text);
         foreach ($res as $title => $article) {
            echo "<div class='article'><h1>" . $title . "</h1><div>" . $article . "</div></div>";
        }
    }
}
