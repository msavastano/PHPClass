<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>User page</title>
        <?php        
        
        if (array_key_exists('page', $_GET)){
            $prevModel = PreviewPage::getPreviewData($_GET['page']);            
        }        
        //set correct css file by theme choice
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
        <!---display data-->
        <div id="wrap">
            <div id="header">
                <?php echo "<h1>",$prevModel['title'],"</h1>"; ?>
            </div>    
            <div id="about">
                <fieldset>
                <legend>ABOUT</legend>               
                <?php echo "<p>",$prevModel['about'],"<p>"; ?>
                </fieldset>
            </div>
            <div id="contact">
                 <fieldset>
                    <legend>Contact</legend>
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
                </fieldset>
            </div>
        </div>
    </body>
</html>
