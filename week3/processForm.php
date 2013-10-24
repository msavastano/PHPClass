<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$fullname = "";
$email = "";
$comm = ""; 

if ( count($_POST) ){

    if (array_key_exists("fullname", $_POST)){
        $fullname = $_POST["fullname"];
    }

    if (array_key_exists("email", $_POST)){
        $email = $_POST["email"];
    }

    if (array_key_exists("comm", $_POST)){
        $comm = $_POST["comm"];
    }

}
    if ( !empty($fullname) && !empty($email)  && !empty($comm) ) {
        
        $dbh = new PDO("mysql:host=localhost;port=3306;dbname=phplab", "root","");
        
        try {
            $stmt = $dbh->prepare('insert into week3 set fullname = :fullnameValue, ' .
                   'email = :emailValue, comments = :commentsValue'  );
            
            $stmt->bindParam(':fullnameValue', $fullname, PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
            $stmt->bindParam(':commentsValue', $comm, PDO::PARAM_STR);
            $stmt->execute();
            
            echo "<h3> Info submitted</h3><p><a href='index.php'>Back to form</a></p>";
            
        }catch (PDOException $e) {
             echo "DB error";
        }
    }else{
         echo "<h3> Info NOT submitted</h3><p><a href='index.php'>Back to form</a></p>";      
    }     
?>