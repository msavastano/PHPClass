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

if ( isset( $_SESSION['last_activity'] ) && time() > $_SESSION['last_activity'] +
        Config::MAX_SESSION_TIME){            
    echo "Sorry timed out<br />";
    session_destroy();
}else{
    $_SESSION['last_activity'] = time();
}
    $_SESSION['last_activity'] = time();

?>