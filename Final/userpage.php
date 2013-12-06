<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Page - use php here</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        // put your code here
        print_r($_GET);
        
        if (array_key_exists('page', $_GET)){
            $prevModel = PreviewPage::getPreviewData($_GET['page']);
            print_r($prevModel);
        }
        
        ?>
    </body>
</html>
