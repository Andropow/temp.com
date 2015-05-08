<?php

require_once Config::app_path() . 'config/debug.php';

class Config {

    static function app_path() {
        return dirname(dirname(__FILE__)) . '\\';
    }

    var $BASE_URL = "temp.com";
    var $DB_HOST = "127.0.0.1";
    var $DB_USER = "root";
    var $DB_PAS = "";
    var $DB_NAME = "tempdb";
    var $PORT = 3306;

}
