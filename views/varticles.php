<?php

require_once dirname(__FILE__) . '/../controllers/carticles.php';

class Varticlles extends Carticles {

    function get_articles() {
        $res = parent::get_articles();

        foreach ($res as $title => $article) {
            echo "<div class='article'><h1>" . $title . "</h1><div>" . $article . "</div></div>";
        }
    }
    
    function list_articles() {
        $res = parent::list_articles();
         echo '<ul>';
        foreach ($res as $uri => $link) {
            echo "\n<li><a class='delart' href=\"\"><img src='../img/del.ico' alt='{$uri}'/></a><a href=\"?articleId={$uri}\">{$link}</a></li>";
        }
        echo '</ul>';
    }
    
    

}
