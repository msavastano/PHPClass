<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Page</title>
         <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        //if there is no log in redirect back to login page
        if (empty($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn'] ){            
            header("Location:index.php");
        }
        
        //check $_GET and redirect if logout is presses
        if ( isset( $_GET["logout"] ) ){
            if ( $_GET["logout"] == "1" ) { 
                session_destroy();
                header("Location:index.php"); //set a get var                
            }
        }
        
        $ws = new Website();        
        $ws->updatePageData($_POST);
        
        $userID = $ws->getUserID($_SESSION['email']);       
        $wpModel = $ws->getWebsiteData($userID['user_id']);        
        
        $title = $wpModel['title'];
        $phone = $wpModel['phone'];
        $email = $wpModel['email'];
        $theme = $wpModel['theme'];
        $about = $wpModel['about'];
        $pageID = $wpModel['page_id'];
        $address = $wpModel['address'];
        $pageName = $wpModel['website'];
        
        ?>
        
        <div id="cent">
            <div class="head">                
                <div><span id="s">S</span><span id="imple">imple</span><span id="aas">aaS</span>   </div>
            </div>
         
                <div class="previewButton">
                    <a href="editPage.php?logout=1">-===LOGOUT===-</a>
                </div>
        <br />
        <div id="editFormDiv">
                <div class="previewButton">                    
                    <a href="userpage.php?page=<?php echo $pageName; ?>" target="_blank">-=Go To Your Page=-</a>
                </div>            
            
            <form name="editForm" action="#" method="post">
                
            <fieldset class="fields">
           
                <label>Title:</label> <br />
                <input class="textField" name="pageTitle" id="pageTitleID" type="text" value="<?php echo $title ?>"> <br />
                
                <label>Theme:</label> <br />
                <select class="textField" name="theme" id="themeID" value="<?php echo $theme ?>">                     
                    <option <?php if ($theme == 1 ) echo 'selected'; ?> value="1">Science Fiction</option>
                    <option <?php if ($theme == 2 ) echo 'selected'; ?> value="2">Fantasy</option>
                    <option <?php if ($theme == 3 ) echo 'selected'; ?> value="3">Horror</option>
                </select><br />
                
                <label>About:</label> <br />
                <textarea name="about" id="aboutID" cols="34" rows="10"><?php echo $about ?></textarea><br />            
                
                <label>Address:</label> <br />
                <input class="textField" name="address" id="addressID" type="text" value="<?php echo $address ?>"> <br />
                <label>Phone:</label> <br />
                <input class="textField" name="phone" id="phoneID" type="text" value="<?php echo $phone ?>"> <br />
                <label>Email:</label> <br />
                <input class="textField" name="email" id="emailID" type="text" value="<?php echo $email ?>"> <br />  
                
                <?php echo '<input type="hidden" name="nameid" value="',$pageID,'" />'; ?>
                <input type="submit" value="Make Edits" name="make_edits" />                        
            </form>
            </fieldset>
        </div>
        </div>
    </body>
</html>
