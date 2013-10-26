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
    //put your code here
    public static function emailIsValid( $email ) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
       //^[a-zA-Z][a-zA-Z0-9]+[@][a-zA-Z0-9]+[\.][a-zA-z]{3,4}$/
        
            return true;
        }else{
            return false;
        }
    }
    
    public static function passwordIsValid( $password ){        
        if ( is_string( $password ) && !empty( $password ) )  {
                return true;
            }else{
                return false;
            }
    }
    
    public static function usernameIsValid( $username ){        
        if ( is_string( $username ) && !empty( $username ) )  {
                return true;
            }else{
                return false;
            }
    }
    
    public static function loginIsValid( $username, $password ){ 
        $password = sha1($password);
        $dbh = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        $stmt = $dbh->prepare('select from signup where username = :usernameValue limit 1');
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
