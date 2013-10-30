<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validator
 *
 * @author michael
 */
class Validator {
    //valideate email - can use several functions
    public static function emailIsValid( $email ) {
        //if (filter_var($email, FILTER_VALIDATE_EMAIL)){ //PHP method validator
        if ( preg_match( "^[a-zA-Z][a-zA-Z0-9]+[@][a-zA-Z0-9]+[\.][a-zA-z]{3,4}$^", $email )){ //regex validator
        //if ( is_string($email) && !empty($email) ) { // just valid string
            return true;
        }
            return false;        
    }
    //validate password
    public static function passwordIsValid( $password ){        
        if ( is_string( $password ) && !empty( $password ) )  {
                return true;
            }
                return false;
            
    }
    //validate username
    public static function usernameIsValid( $username ){        
        if ( is_string( $username ) && !empty( $username ) )  {
                return true;
            }
                return false;
           
    }
    //this fuction checks if login.php was valid login
    public static function loginIsValid( $username, $password ){ 
        $password = sha1($password);
        $dbh = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        $stmt = $dbh->prepare('select * from signup where username = :usernameValue limit 1');
        $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        if ( count($result)){
            if ($result[0]['password'] == $password)
                return true;
        }
        return false;   
        
    }
}
?>