<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Website
 *
 * @author michael
 */
class Website extends DB{
    
    public function initWebpage($lastID){
        $dbc = new DB();
        $db = $dbc->getDB();
        
        $statement = $db->prepare('insert into page set user_id = :user_id' );                
                $statement->bindParam(':user_id', $lastID, PDO::PARAM_INT);
                if ($statement->execute() ){                
                    return true;
                }        
    }
    
    public function getlastid(){
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1');
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getWebsiteData($id) {
        $dbc = new DB();
        $db = $dbc->getDB();
        
        $statement = $db->prepare('select * from page, users '
                . 'where users.user_id = :id AND page.user_id = users.user_id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getUserID($email) {
        $dbc = new DB();
        $db = $dbc->getDB();
        
        $statement = $db->prepare('select user_id from users '
                . 'where email = :email');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
}
