<?php

require_once dirname(__FILE__) . '/../models/mnews.php';

class Cnews extends Mnews {

    protected function get_all_news() {
        $res = parent::get_all_news();
        while ($row = $res->fetch_assoc()) {
            $news[$row['Title']] = $row['Article'];
        }
        return $news;
    }

    function get_news($id) {
        $res = parent::get_news($id);
        return $res->fetch_assoc();
    }

    protected function list_news() {
        $res = parent::list_news();
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                $news[$row['Id']] = $row['Title'];
            }
            return $news;
        }
        return null;
    }

    function create_news($post) {
        parent::create_news($post);
    }

    function update_news($post) {
        parent::update_news($post);
    }

    function delete_news($id) {
        parent::delete_news($id);
    }

}
