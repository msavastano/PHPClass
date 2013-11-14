<?php

//database class
class DB {
    //get data object    
    protected $db = null;

    public function getDB() {        
        try {
            $this->db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        } catch (Exception $ex) {
           $this->db = null;
        }
        return $this->db;        
    }
    
     public function closeDB() {        
        $this->db = null;        
    }
    
    
}
