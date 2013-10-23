<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Test </title>
        <link rel="stylesheet" type="text/css" href="styles.css" />		
    </head>
        
        <?php
        $fullname = $_POST["fname"];
        $email = $_POST["email"];
        $comm = $_POST["comm"];
        
        $fnameERR = "";
        $emailERR = "";
        $commERR = "";                
        ?>
	
<body>
    
 <?php
if (count($_POST) ) {
    
    if (!array_key_exists("fname", $_POST) || empty($_POST["fname"])) {        
        $fnameERR = "enter full name";        
    }
    
     if (!array_key_exists("email", $_POST) || empty($_POST["email"])) {         
         $emailERR = "enter email";
     }
     elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false)  {
        $emailERR = "enter valid email";
    }
    
    if (!array_key_exists("comm", $_POST) || empty($_POST["comm"])) {         
         $commERR = "enter comments";
     }
}
?>
    
    <form name="mainform" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <label>Name</label> <input type="text" name="fname" value="<?php echo $fullname; ?>" /> 
              <?php echo $fnameERR; ?>
          <br /><br />
          <label>Email</label> <input type="text" name="email" value="<?php echo $email; ?>"  /> 
              <?php echo $emailERR; ?>
          <br /><br />
          <label>Comments</label>  <br /> <textarea name="comm"><?php echo $comm; ?></textarea> 
              <?php echo $commERR; ?>
          <br /><br />
          <input type="submit" name="submit" value="submit">
    </form>
    
    <?php
        $fullname = $_POST["name"];
        $pass = $_POST["pass"];       
        
        $nameERR = "";
        $passERR = "";
        
        if (count($_POST) ) {
            if (!array_key_exists("name", $_POST) || empty($_POST["name"])) {        
                $nameERR = "Please enter name";        
            }
    
            if (!array_key_exists("pass", $_POST) || empty($_POST["pass"])) {         
                $passERR = "Please enter password";
            }elseif (strlen($pass)< 7){
                $passERR = "Please make password at least 7 characters";               
            }elseif (!preg_match("#[0-9]+#", $pass)) {
                $passERR = "Please include at least one number";
            }                
        }                 
        ?>
        
        <form name="mainform" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <label>Name</label> <input type="text" name="name" value="<?php echo $fullname; ?>" /> 
              <?php echo $nameERR; ?>
          <br /><br />
          <label>Password</label> <input type="password" name="pass" value=""  /> 
              <?php echo $passERR; ?>
          <br /><br />
          <input type="submit" name="submit" value="submit">
        </form>
</body>
</html>