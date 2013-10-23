<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> <?php echo "PHPClass Folder ", $_GET["page"], " Page" ?></title>
        <link rel="stylesheet" type="text/css" href="styles.css" />		
    </head>
    <body>    
        
        <?php 
        //echo '<h3>hello - PHPClass Folder Index Page</h3>'; // echo rendered in html by php
        
       // $_POST = array(); // post creates array - poplates through Form
       //  $_GET = array(); // get populates through URL
       $page = "";
       
       if ( count($_GET) ) {  
       
           if (array_key_exists("page", $_GET)){
               $p = $_GET["page"];          
           }
        
        echo count($_GET), "<br />";
        echo $_GET["page"], "<br />";        
        echo $_GET["hi"], "<br />";
        echo print_r($_GET), "<br />";
        echo $_GET["page"], "<br />", $_GET["hi"], "<br />";
        
            if (strlen("page")){
                echo "<p>", $page, strlen($page), "</p>";        
           }
        }
        ?>

    </body>
</html>
