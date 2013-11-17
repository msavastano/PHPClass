<?php

class Signup extends DB {
    
    
    protected $errors = array();
    
    //set vars
    //$username = ( isset($_POST["username"]) ? $_POST["username"] : "" );
    //$email = ( isset($_POST["email"]) ? $_POST["email"] : "" );
    //$password = ( isset($_POST["password"]) ? $_POST["password"] : "" );
    
    //is username in da already
    public function websiteNameIsTaken() {        
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select website from users where website = :websiteValue limit 1');
            $stmt->bindParam(':websiteValue', $$_POST['website'], PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);            
            if ( is_array($result) && count($result) ) {
                return true; //if name is in db
            }
        }
        return false;        
    }
    //1st step, calls methods
    public function entryIsValid(){
        $this->emailEntryIsValid();         
        $this->websiteEntryIsValid();   
        $this->passwordEntryIsValid();
        /*Validator::webpageIsValid($str);
        Validator::emailIsValid($str);
        Validator::passwordIsValid($str);*/
        return (count($this->errors) ? false : true);
    }
    //invalid or missing email
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
    
    public function websiteEntryIsValid(){
        if (array_key_exists('website', $_POST)){
            if ( !Validator::webpageIsValid($_POST['website'])) {
                $this->errors['website'] = "Website is not valid";
           }else if ($this->websiteNameIsTaken( $_POST['website'] )){ //checks to see if username is already in database 
               $this->errors['website'] = "Website is taken";
            }
        }else{
                $this->errors['website'] = "Username is missing";
            }
            return (empty($this->errors['website']) ? true : false);
    }
    //is password valid
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
        $_POST['password'] = sha1($_POST['password']);
        $db = $this->getDB();
        if (null != $db) {
            $stmt = $db->prepare('insert into users set website = :websiteValue, '
                    . 'email = :emailValue, password = :passwordValue');
            $stmt->bindParam(':websiteValue', $_POST['website'], PDO::PARAM_STR);
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