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
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        // put your code here
        
        $ab = new AddressBook();
        $nm = new Name();
        $addr = new Address();
        
        print_r($_POST);
        //print_r($_GET);
        
        $ab->checkDeletes();
        $ab->checkUpdates();
        
        $nameError = "";
        $addrError = "";
        $cityError = "";
        $stateError = "";
        $zipError = "";
        
        if(array_key_exists('create', $_POST)&&($_POST['create']=="ADD")){
            
            if (!Validator::nameExists($_POST['name'])){
                $nameError = "Name cannot be empty";
            }else if(!Validator::addrExists($_POST['address'])){
                $addrError = "Address cannot be empty";
            }else if(!Validator::cityExists($_POST['city'])){
                $cityError = "City cannot be empty";
            }else if(!Validator::stateValid($_POST['state'])){
                $stateError = "State needs to be 2 letter abbreviation";
            }else if(!Validator::zipValid($_POST['zip'])){
                $zipError = "Zip needs to be 5 numbers";
            }else{
        
            
                print_r($_POST);
                $nm->addName($_POST['name']);
                $lastID = $nm->getlastid();
                print_r($lastID);
                $addr->createAddress($lastID, $_POST);
                header("Location:index.php");
            }
        }
        
        
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
        
        $ab->display();  
        ?>
        
        <br clear="all" />
        <div id="formDiv">
        <form action="#" method="post">
        <?php 
            if ( $ab->isEdit() ) {
                echo '<label>Name</label> </label><input type="text" name="name" value="',$name ,'" readonly />',$nameError,'<br />' ;
            } else {
               echo '<label>Name</label> <input type="text" name="name" value="',$name ,'"  />',$nameError,'<br />' ;
            }
            ?>
            
            <label>Address</label> <input type="text" name="address" value="<?php echo $address ?>" /><?php echo '<span class = "error">',$addrError,'</span>' ?><br />
            <label>City</label><input type="text" name="city" value="<?php echo $city ?>" /><?php echo $cityError ?><br />
            <label>State</label> <input type="text" name="state" value="<?php echo $state ?>" /><?php echo $stateError ?><br />
            <label>ZIP</label> <input type="text" name="zip" value="<?php echo $zip ?>" /><?php echo $zipError ?><br />
            <br />
            <?php 
                if ( $ab->isEdit() ) {
                    echo '<input type="submit" name="edit" value="Update" />';                
                    echo '<input type="hidden" name="id" value="',$ab->getEditID(),'" />';    
                    echo '<input type="hidden" name="nameid" value="',$nm->getEditID(),'" />';
                    echo '<a id="addLink" href="index.php">Get Add Button</a>';
                } else {
                    echo '<input type="submit" name="create" value="ADD" />';
                    
                }
            ?>
        </form>
        </div>
        
    </body>
</html>
