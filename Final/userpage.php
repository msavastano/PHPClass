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
        <?php
        
        echo "GET array ";
        print_r($_GET);
        echo '<br />';
        if (array_key_exists('page', $_GET)){
            $prevModel = PreviewPage::getPreviewData($_GET['page']);
            echo "prevModel array ";
            print_r($prevModel);
        }
        
            if (array_key_exists('theme',$prevModel)){
                if ($prevModel['theme']=="1"){
                    echo '<link rel="stylesheet" type="text/css" href="css/themeOne.css" />';
                }else if($prevModel['theme']=="2"){
                    echo '<link rel="stylesheet" type="text/css" href="css/themeTwo.css" />';
                }else if ($prevModel['theme']=="3"){
                    echo '<link rel="stylesheet" type="text/css" href="css/themeThree.css" />'; 
                }    
            }else{
                echo '<link rel="stylesheet" type="text/css" href="css/style.css" />';
            }
        ?>
    </head>
    <body>
        <?php
        // put your code here
        
        
        ?>
        
        <div id="wrap">
            <div id="header">
                <?php echo "<h1>",$prevModel['title'],"</h1>"; ?>
            </div>    
            <div id="about">
                <h3>ABOUT:</h3>
                <?php echo "<p>",$prevModel['about'],"<p>"; ?>
            </div>
            <div id=""contact">
                <div id="eml">
                    <h3>EMAIL:</h3>
                    <?php echo "<p>",$prevModel['email'],"<p>"; ?>
                </div>

                <div id="phn">
                    <h3>PHONE:</h3>
                    <?php echo "<p>",$prevModel['phone'],"<p>"; ?>
                </div>

                <div id="addr">
                    <h3>ADDRESS:</h3>
                    <?php echo "<p>",$prevModel['address'],"<p>"; ?>
                </div>
            </div>
        </div>
    </body>
</html>
