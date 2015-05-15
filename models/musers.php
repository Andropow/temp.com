<?php

require_once dirname(__FILE__) . '/../config/db.php';

class Musers extends Db {

    public function get_login_n_pasword($myusername, $mypassword) {
        $sql= "SELECT *  FROM tempdb.users where `Login` = '{$myusername}' AND `Pasvord` = '{$mypassword}'"
        . " limit 1";
        return $this->sql($sql);
    }
}
