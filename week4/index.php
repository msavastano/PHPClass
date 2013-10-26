<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
    </head>
    <body>
        <?php
        session_start();
        
        include 'Validator.php';
        include 'Config.php';
        
        //$valObj = new Validator();
        
        $testEmail = "test@mail.com";
        
        if (Validator::emailIsValid($testEmail)) {
            echo "email is valid<br />";
        }else{
            echo "email is NOT valid<br />";
        }
        
        $dbh = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        $stmt = $dbh->prepare('SELECT * FROM week3');
        $stmt->execute();

        //$result = $stmt->fetchAll();
        
        print_r($result);
        
        
        
        //echo $_SESSION['maxlife'];
        
       // unset($_SESSION['maxlife']);
        
       // echo $_SESSION['maxlife'];
        
        echo "<h1>" , $_SESSION["counter"], "</h1>";
        
        ?>
    </body>
</html>
