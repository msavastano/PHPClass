<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validator
 *
 * @author michael
 */
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
