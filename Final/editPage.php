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
        <title>Edit Page</title>
         <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        
        //TEST CODE
        print_r($_SESSION);
        echo "<br />";
        print_r($_POST);
        
        //if there is no log in redirect back to login page
        if (empty($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn'] ){            
            header("Location:login_1.php");
        }
        
        //check $_GET and redirect if logout is presses
        if ( isset( $_GET["logout"] ) ){
            if ( $_GET["logout"] == "1" ) { 
                session_destroy();
                header("Location:login_1.php"); //set a get var                
            }
        }
        
        $ws = new Website();
        
        $userID = $ws->getUserID($_SESSION['email']);
        print_r($userID);
        $wpModel = $ws->getWebsiteData($userID['user_id']);
        
        print_r($wpModel);
        $title = $wpModel['title'];
        $phone = $wpModel['about'];
        $email = $wpModel['email'];
        $theme = $wpModel['theme'];
        $about = $wpModel['about'];
        $pageID = $wpModel['page_id'];
        $address = $wpModel['address'];
        //$wpModel = "";
        
        /*if ($ws->isEdit()){
        
            $wpModel = getWebsiteData($userID);
            
            $title = $wpModel[""]];
            $phone = $wpModel"";
            $email = $wpModel"";
            $theme = $wpModel"";
            $about = $wpModel"";
            $pageID = $wpModel"";
            $address = $wpModel"";
            $
               
        }*/
        
        
        ?>
         <h1> <?php echo $_SESSION['email']; ?> 's Page Editor </h1>
         <a href="editPage.php?logout=1">LOGOUT</a>
        
        <div id="editFormDiv">
            <fieldset class="fields">
            <legend class="legends">Edit your Page</legend>
            <form name="editForm" action="#" method="post">
                <label>Title:</label> <br />
                <input name="pageTitle" id="pageTitleID" type="text" value="<?php echo $title ?>"> <br />
                <div id="previewButton">
                    <a href="" target="_blank">Preview Your Page</a>
                </div>
                <label>Theme:</label> <br />
                <select name="theme" id="themeID"> 
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select><br />
                <label>Address:</label> <br />
                <input name="address" id="addressID" type="text" value="<?php echo $title ?>"> <br />
                <label>Phone:</label> <br />
                <input name="phone" id="phoneID" type="text" value="<?php echo $phone ?>"> <br />
                <label>Email:</label> <br />
                <input name="email" id="emailID" type="text" value="<?php echo $email ?>"> <br />
                <label>About:</label> <br />
                <textarea name="about" id="aboutID" cols="50" rows="10"><?php echo $about ?></textarea><br /> 
            
                <input type="submit" value="Make Edits" />
                
                

                    
            </form>
            </fieldset>
        </div>
    </body>
</html>
