<?php


class Validator {
    
    //checks against regex
    public static function emailIsValid( $str ) {
       if ( is_string($str) && !empty($str) && 
               preg_match("/[A-Za-z0-9_]{2,}+@[A-Za-z0-9_]{2,}+\.[A-Za-z0-9_]{2,}/",$str) != 0 ) {
           return true;
       }        
       return false; 
    }
    //checks for string NEED VALIDATION REGEX
    public static function webpageIsValid( $str ) {
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
}

