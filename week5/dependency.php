<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


spl_autoload_register(function($class) { //includes all files for site
    include 'class/'.$class . '.php';
});
// session
session_start();
session_regenerate_id(true);
        
?>