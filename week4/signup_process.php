<?php
include 'Config.php';
 include 'Validator.php';
 
//set database
 $dbh = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
 
 //set vars
$username = ( isset($_POST["username"]) ? $_POST["username"] : "" );
$email = ( isset($_POST["email"]) ? $_POST["email"] : "" );
$password = ( isset($_POST["password"]) ? $_POST["password"] : "" );

       //validate entries
      if ( Validator::usernameIsValid( $username ) && Validator::emailIsValid( $email )  
              && Validator::passwordIsValid( $password ) ) { 
        try {//validate database
              $stmt = $dbh->prepare('insert into signup set username = :usernameValue, ' .
                     'email = :emailValue, password = :passwordValue'  );

              $password = sha1($password);
              // bind values to parameters
              $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
              $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
              $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
              
              //check to make sure execute
            if ( $stmt->execute(array(':usernameValue' => $username, ':emailValue' => $email,
               ':passwordValue' => $password )) ){
                $successMsg = "<h3>Info Submited</h3><br /><p> Got to <a href='login.php'>login </a> page</P>";
            }    
          }catch (PDOException $e) {
               $loginErrMsg = "DB error";
          }
    }else {
         $errorMsg = "<h3>Info NOT Submited</h3>";
    }
    

    include "signup.php";

?>