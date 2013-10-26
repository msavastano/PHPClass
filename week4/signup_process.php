<?php
include 'Config.php';
 include 'Validator.php';
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $dbh = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
 
$username = ( isset($_POST["username"]) ? $_POST["username"] : "" );
$email = ( isset($_POST["email"]) ? $_POST["email"] : "" );
$password = ( isset($_POST["password"]) ? $_POST["password"] : "" );


      if ( Validator::usernameIsValid( $username ) && Validator::emailIsValid( $email )  
              && Validator::passwordIsValid( $password ) ) {   
        
        
        try {
              $stmt = $dbh->prepare('insert into signup set username = :usernameValue, ' .
                     'email = :emailValue, password = :passwordValue'  );

              $password = sha1($password);

              $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
              $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
              $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
              
              
            if ( $stmt->execute() ){
                $successMsg = "<h3>Info Submited</h3>";
            } else {
                $errorMsg = "<h3>Info NOT Submited</h3>";
            }
         
            /*
            if ( $stmt->execute() ){
                $sucessMsg = "<h3>Info Submited</h3>";
            } else {
                $errorMsg = "<h3>Info NOT Submited</h3>";
            }
             * */
             
              

          }catch (PDOException $e) {
               echo "DB error" . $e;
          }
    }

    include "signup.php";

?>