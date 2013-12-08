<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<!--
//LAB 
// VALIDATE
// ADD DATA 
// NAME field should be a dropdown
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        $ab = new AddressBook();
        
        
        print_r($_POST);
        print_r($_GET);
        
        $ab->checkDeletes();
        $ab->display();
        ?>
        
        <br clear="all" />
        <form action="#" method="post">
            name <input type="text" name="name" value="" /><br />
            Address <input type="text" name="address" value="" /><br />
            city <input type="text" name="city" value="" /><br />
            state <input type="text" name="state" value="" /><br />
            ZIP <input type="text" name="zip" value="" /><br />
            <br />
            
            
            <input type="submit" value="ADD" name="add" />
            <input type="submit" value="EDIT" name="edit" />
            <input type="hidden" value="EDIT" name="id" />
            
        </form>
    </body>
</html>
