
<?php
spl_autoload_register(function($class) { //includes all files for site
    include 'class/'.$class . '.php';
});
// session set for all pages
session_start();
session_regenerate_id(true);

$token = uniqid();
$_SESSION['token'] = $token;

//records time of last activity
if ( isset( $_SESSION['last_activity'] ) && isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true && time() > $_SESSION['last_activity'] +
        Config::MAX_SESSION_TIME){            
    echo "Sorry timed out<br />";
    session_destroy();
}else{
    $_SESSION['last_activity'] = time();
}
   // $_SESSION['last_activity'] = time();
?>