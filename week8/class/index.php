<?php include 'dependency.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
        $nm = new Name();
        
        //print_r($_POST);
        //print_r($_GET);
        
        $ab->checkDeletes();
        $ab->checkUpdates();
        
        
        $ab->display();
        
        
        $name = "";
        $address = "";
        $city = "";
        $state = "";
        $zip = "";
        $addressModel = "";
        $nameModel = "";
        
        if ( $ab->isEdit() ) {
          $addressModel = Address::getAddress($ab->getEditID());          
          $nameid = $addressModel["name_id"];
          $nameModel = Name::getName($nameid);
          $name = $nameModel["name"];
          $address = $addressModel["address"];
          $city = $addressModel["city"];
          $state = $addressModel["state"];
          $zip = $addressModel["zip"];   
          //print_r($addressModel);
        }
        ?>
        
        <br clear="all" />
        <form action="#" method="post">
            name <input type="text" name="name" value="<?php echo $name ?>" /><br />
            Address <input type="text" name="address" value="<?php echo $address ?>" /><br />
            city <input type="text" name="city" value="<?php echo $city ?>" /><br />
            state <input type="text" name="state" value="<?php echo $state ?>" /><br />
            ZIP <input type="text" name="zip" value="<?php echo $zip ?>" /><br />
            <br />
            <?php 
                if ( $ab->isEdit() ) {
                    echo '<input type="submit" name="edit" value="Update" />';                
                    echo '<input type="hidden" name="id" value="',$ab->getEditID(),'" />';    
                    echo '<input type="hidden" name="nameid" value="',$nm->getEditID(),'" />';
                } else {
                    echo '<input type="submit" name="create" value="ADD" />';
                }
            ?>
        </form>
        
    </body>
</html>
