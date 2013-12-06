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
        //print_r($_SESSION);
        echo "<br />";
        //print_r($_POST);
        
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
        
        $ws->updatePageData($_POST);
        
        $userID = $ws->getUserID($_SESSION['email']);
        //print_r($userID);
        $wpModel = $ws->getWebsiteData($userID['user_id']);
        
        print_r($wpModel);
        $title = $wpModel['title'];
        $phone = $wpModel['phone'];
        $email = $wpModel['email'];
        $theme = $wpModel['theme'];
        $about = $wpModel['about'];
        $pageID = $wpModel['page_id'];
        $address = $wpModel['address'];
        $pageName = $wpModel['website'];
        
        ?>
         <h1> <?php echo $_SESSION['email']; ?> 's Page Editor </h1>
         <a href="editPage.php?logout=1">LOGOUT</a>
        
        <div id="editFormDiv">
                <div id="previewButton">
                    <a href="userpage.php?page=<?php echo $pageName; ?>" target="_blank">Preview Your Page</a>
                </div>
            <fieldset class="fields">
            
            <form name="editForm" action="#" method="post">
                
            <fieldset class="fields">
           
                <label>Title:</label> <br />
                <input class="textField" name="pageTitle" id="pageTitleID" type="text" value="<?php echo $title ?>"> <br />
                
                <label>Theme:</label> <br />
                <select class="textField" name="theme" id="themeID" value="<?php echo $theme ?>">  
                    
                    <option <?php if ($theme == 1 ) echo 'selected'; ?> value="1">Dragon Theme</option>
                    <option <?php if ($theme == 2 ) echo 'selected'; ?> value="2">Elf Theme</option>
                    <option <?php if ($theme == 3 ) echo 'selected'; ?> value="3">Fairy Theme</option>
                </select><br />
                
                <label>About:</label> <br />
                <textarea name="about" id="aboutID" cols="40" rows="10"><?php echo $about ?></textarea><br /> 
            </fieldset>
                
                <fieldset class="fields">
                
                    <label>Address:</label> <br />
                    <input class="textField" name="address" id="addressID" type="text" value="<?php echo $address ?>"> <br />
                    <label>Phone:</label> <br />
                    <input class="textField" name="phone" id="phoneID" type="text" value="<?php echo $phone ?>"> <br />
                    <label>Email:</label> <br />
                    <input class="textField" name="email" id="emailID" type="text" value="<?php echo $email ?>"> <br />
                </fieldset>
               
                
                <?php echo '<input type="hidden" name="nameid" value="',$pageID,'" />'; ?>
                <input type="submit" value="Make Edits" name="make_edits" />
                
                

                    
            </form>
            </fieldset>
        </div>
    </body>
</html>
