<?php
require_once dirname(__FILE__).'/../models/marticles.php';

class Carticles extends Marticles {
    function get_articles(){
        $res = parent::get_articles();
        while ($row = $res->fetch_assoc()){
            $articles[$row['Title']] = $row['Article'];
        }
        return $articles;
    }
    
    
}

$article = new Carticles();
$varticle = $article->get_articles();

