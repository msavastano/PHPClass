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
    //checks for string
    public static function nameIsValid( $str ) {
       if ( is_string($str) && !empty($str) ) {           
           return true;
       }
       return false; 
    }
    
    //checks for string
    public static function commentsIsValid( $str ) {
       if ( is_string($str) && !empty($str) ) {           
           return true;
       }
       return false; 
}

    public static function nameExists( $str ) {
        if ( is_string($str) && !empty($str) && count_chars($str)>1) {           
           return true;
       }
       return false; 
    }
    
    public static function addrExists( $str ) {
        if ( is_string($str) && !empty($str) && count_chars($str)> 1) {           
           return true;
       }
       return false; 
    }
    
    public static function stateValid( $str ) {
        if ( is_string($str) && !empty($str) && 
               preg_match("/[a-z]{2}/",$str) != 0 ) {           
           return true;
       }
       return false; 
    }
    
    public static function cityExists( $str ) {
        if ( is_string($str) && !empty($str) && count_chars($str)> 1) {           
           return true;
       }
       return false; 
    }
    
    public static function zipValid( $str ) {
        if ( is_string($str) && !empty($str) && preg_match("/[0-9]{5}/",$str) != 0 ) {           
           return true;
       }
       return false; 
    }
}

