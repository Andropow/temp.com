<?php
require_once dirname(__FILE__).'/../models/marticles.php';

class Carticles extends Marticles {
    protected function get_articles(){
        $res = parent::get_articles();
        while ($row = $res->fetch_assoc()){
            $articles[$row['Title']] = $row['Article'];
        }
        return $articles;
    }
    
    function get_article($id){
        $res = parent::get_article($id);
        return $res->fetch_assoc();
    }
    
    protected function list_articles() {
        $res = parent::list_articles(null);
         while ($row = $res->fetch_assoc()){
            $articles[$row['Id']] = $row['Title'];
         }
         return $articles;
    }
    
    function create_article($post) {
        parent::create_article($post);
    }
    
    function update_article($post) {
        parent::update_article($post);
    }
    
    function delete_article($id) {
        parent::delete_article($id);
    }
}



