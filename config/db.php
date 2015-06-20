<?php

require_once dirname(__FILE__).'/db_config.php';


class Db extends Config {

    private $conect;

    public function __construct() {
        $this->open_connection();
    }
    
    public function __destruct() {
        //$this->conect->close();  
        unset($this->conect);
    }

    private function open_connection() {
       // $this->conect = mysqli_connect("127.0.0.1", "root", "", "tempdb", 3306)
        try{
            if ($this->conect!= null){
                unset($this->conect);
            }
             $this->conect = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PAS, $this->DB_NAME, $this->PORT);
        }
        catch (Exception $e){}
       // or die("Error " . mysqli_error($this->conect)); 
        if (!$this->conect) {
            die("Database conection failed: ");
        }
       $this->conect->set_charset("utf8") or die("failed set charset utf8");  
    }
    
    public function sql($query){
        $res =  $this->conect->query($query);
        if(!$res){
            die("Database query faild ");
        }
        return $res;
    }
}


