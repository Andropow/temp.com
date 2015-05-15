<?php

require_once dirname(__FILE__) . '/../controllers/cnews.php';

class Vnews extends Cnews {

    function get_all_news() {
        $res = parent::get_all_news();

        foreach ($res as $title => $article) {
            echo "<div class='news'><h1>" . $title . "</h1><div>" . $article . "</div></div>";
        }
    }

    function list_news() {
        $res = parent::list_news();
        if (!$res) {
            return null;
        }
        echo '<ul>';
        foreach ($res as $uri => $link) {
            echo "\n<li><a class='del' href=\"\"><img src='../img/del.ico' alt='{$uri}'/></a><a href=\"?id={$uri}\">{$link}</a></li>";
        }
        echo '</ul>';
    }

}
