<?php

require_once dirname(__FILE__) . '/../models/musers.php';

class Cusers extends Musers {

    function get_login_n_pasword($myusername, $mypassword) {
        $res = parent::get_login_n_pasword($myusername, $mypassword);
        $row = $res->fetch_assoc();
        return $row;
    }

    function is_avtorized($login, $pas) {
        $user = $this->get_login_n_pasword($login, $pas);
        if ($user['Login'] === $login && $user['Pasvord'] === $pas) {
            return true;
        }
        return false;
    }

}
