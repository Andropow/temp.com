<?php

class Service { 

    public static function k_debug($arr) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

    static function clean_text($str) {
        if (get_magic_quotes_gpc()) {
            $str = str_replace('\"', "&quot;", $str);
            $str = str_replace('\'', "&039;", $str);
            $str = str_replace('<', "&lt;", $str);
            $str = str_replace('>', "&gt;", $str);
        } else {
            $str = htmlspecialchars($str, ENT_QUOTES, "UTF-8", FALSE);
        }
        return $str;
    }

    static function get_slider_skripts($id) {
        settype($id, 'integer');
        if (!$id || $id === 1) {
            $str = <<<TEXT
        <script type="text/javascript" src="js/jquery.min.js"></script> 
        <script type="text/javascript" src="js/slides.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#slides").slides({
                    responsive: true
                });
            });
        </script>
TEXT;
            return $str;
        }
        return NULL;
    }

}
