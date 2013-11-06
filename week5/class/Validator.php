<?php


class Validator {
    
    //checks against regex
    public static function emailIsValid( $str ) {
       if ( is_string($str) && !empty($str) && preg_match("/[A-Za-z0-9_]{2,}+@[A-Za-z0-9_]{2,}+\.[A-Za-z0-9_]{2,}/",$str) != 0 ) {
           return true;
       }        
       return false; 
    }
    //checks for string
    public static function usernameIsValid( $str ) {
       if ( is_string($str) && !empty($str) ) {           
           return true;
       }
       return false; 
    }
    //checks for string
    public static function passwordIsValid( $str ) {
       if ( is_string($str) && !empty($str) ) {
            
           return true;
       }        
       return false; 
    }
    //validates whether POST data exists
     public static function loginIsValidPost() {
          if ( !array_key_exists("username", $_POST) 
                || !array_key_exists("password", $_POST) ) {
               return false;
          }          
          return Validator::loginIsValid($_POST["username"],$_POST["password"] ); //sends into reusable validator
     }
     //validates against strings
      public static function loginIsValid( $username, $password ) {
        //static class cannot call its own class with '$this->'
           if( !Validator::usernameIsValid($username) 
                    || !Validator::passwordIsValid($password) ) {
             return false;             
           }  //checks agaist data in database
        $password = sha1($password);
        $dbCls = new DB();
        $db = $dbCls->getDB();
        if ( NULL != $db ) {
            $stmt = $db->prepare('select * from signup where username = :usernameValue and password = :passwordValue limit 1');
            $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
            $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
           
            if (is_array($result) && count($result) ){                
                return true;
            }            
        }        
        return false;      
    }
    
    public static function signupEntryIsValid() {        
        if ( count($_POST) ) {            
        }       
        return false;
    }
    
}
