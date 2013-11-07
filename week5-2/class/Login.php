<?php


class Login {
    //check for correct passcode
    public static function processLogin(){
         $_SESSION['allowGuestbookAccess'] = false;        
        if (isset($_POST['passcode']) && $_POST['passcode'] == "test") {
            $_SESSION['allowGuestbookAccess'] = true;
            header("Location:guestbook.php");
        }
    }
    //user gets redirected if passcode not set or incorrect
    public static function confirmAccess(){
        if ( !isset($_SESSION['allowGuestbookAccess']) || $_SESSION['allowGuestbookAccess'] != true) {
            header("Location:login.php");            
        }
    }
}


