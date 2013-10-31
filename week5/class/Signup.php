<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Signup
 *
 * @author gforti
 */
class Signup extends DB {
    //put your code here
    
    protected $errors = array();

    public function userNameIsTaken( $username ) {        
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select username from signup where username = :usernameValue limit 1');
            $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);            
            if ( is_array($result) && count($result) ) {
                return true;
            }
        }
        return false;        
    }
    
    public function entryIsValid(){
        $this->emailEntryIsValid(); 
        $this->usernameEntryIsValid();   
        $this->passwordEntryIsValid();   
       
        return (count($this->errors) ? false : true);
    }
    
    public function emailEntryIsValid(){
        if (array_key_exists('email', $_POST)){
                if ( !Validator::emailIsValid($_POST['email'])){
                    $this->errors['email'] = "Email is not valid";  
                 }
        }else{
            $this->errors['email'] = "Email is missing";            
        }
        return (empty($this->errors['email']) ? true : false);
    }
    
    public function usernameEntryIsValid(){
        if (array_key_exists('username', $_POST)){
            if ( !Validator::usernameIsValid($_POST['username'])) {
                $this->errors['username'] = "Username is not valid";
            }else if (userNameIsTaken( $username )){  
                $this->errors['username'] = "Username is taken";
            }
        }else{
                $this->errors['username'] = "Username is missing";
            }
            return (empty($this->errors['username']) ? true : false);
    }
    
    public function passwordEntryIsValid(){
        if (array_key_exists('password', $_POST)){
            if ( !Validator::passwordIsValid($_POST['password'])) {
                $this->errors['password'] = "password is not valid";
            }
        }else{
                $this->errors['password'] = "password is missing";
            }
            return (empty($this->errors['password']) ? true : false);
    }
    
    public function saveEntry() { //revalidate on save to db - similar to week 4 signup sheet
        //if db is not null
        // bind all the values
        //hash password
        //if execute
        if (! $this->entryIsValid() ) return false;
        $db = $this->getDB();
        if (null != $db) {
            $stmt = $db->prepare('insert into signup set username = :usernameValue, '
                    . 'email = :emailValue, password = :passwordValue');
            $stmt->bindParam(':usernameValue', $_POST['username'], PDO::PARAM_STR);
            $stmt->bindParam(':passwordValue', $_POST['password'], PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $_POST['email'], PDO::PARAM_STR);
            if ($stmt->execute() ){
                return true;
            }
        }
        return false;
    }
    
    public function getErrors() {
        return $this->errors;
    }
}


?>