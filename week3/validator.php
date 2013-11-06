<?php


class Validator {
    //put your code here
    public function __construct() {
        
    }
    
    function validateFullName( $fullname ) {
            if ( is_string( $fullname ) && !empty( $fullname ) )  {
                return true;
            }else{
                return false;
            }
    }
    
    function validateEmail( $email ) {
        if ( is_string( $email ) && !empty( $email ) )  {
                return true;
            }else{
                return false;
            }
    }   
    
}   
