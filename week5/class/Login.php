<?php

//unused class- this method is in validator class
class Login extends DB {
    
    //checks login from user against db        
    public function loginIsValid( $username, $password ) {
        
        $password = sha1($password);
        $db = $this->getDB();
        if ( NULL != $db ) {
            $stmt = $db->prepare('select * from signup where username = :usernameValue and password = :passwordValue limit 1');
            $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
            $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ( is_array($result) && count($result) ) return true;
        }
        return false;
    }
    
    
}
