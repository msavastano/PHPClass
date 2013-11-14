<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ItemF</title>
    </head>
    <body>
        <?php
        // put your code here
        
        
        /*
         * From all your notes and assignments from previous weeks, you should
         * be able to create an address book form that can be submited to this page
         * and with the data collected should be able to save to the database.
         * 
         * 1. Start by creating the form and making sure you can collect the data from
         * the $_POST super global.
         * 
         * 2. Validate the data so at least something is being entered correctly.
         * 
         * 3. Take the validated data and insert into the database with bindparam 
         * before excuting
         */
        
        $db = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");
        
        
        if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['city']) && 
                isset($_POST['state']) && isset($_POST['zip'])){
            if (isStringValid( $_POST['name'] ) && isStringValid( $_POST['address'] ) && isStringValid( $_POST['city'] ) &&
                    isStringValid( $_POST['state'] ) && isStringValid( $_POST['zip'] )){
                if (null != $db) {
                    $stmt = $db->prepare( 'insert into addressbook set name = :nameValue,
                            address = :addressValue,
                            city = :cityValue,
                            state = :stateValue,
                            zip = :zipValue' );
                    $stmt->bindParam(':nameValue', $_POST['name'], PDO::PARAM_STR);
                    $stmt->bindParam(':addressValue', $_POST['address'], PDO::PARAM_STR);
                    $stmt->bindParam(':cityValue', $_POST['city'], PDO::PARAM_STR);
                    $stmt->bindParam(':stateValue', $_POST['state'], PDO::PARAM_STR);
                    $stmt->bindParam(':zipValue', $_POST['zip'], PDO::PARAM_STR);
                    if ($stmt->execute()){
                        echo "data entered";
                    }else{
                        echo "data NOT entered";
                    } 

                }else{
                    echo "db error";
                }

           }else{
               echo "A string is not valid";
           }
       }
        
        function isStringValid( $str ){        
        if ( is_string( $str ) && !empty( $str ) )  {
                return true;
            }
                return false;
        }
        
        
        
        ?>
        <form name="mainform" action="#" method="post">
            Name: <br /><input type="text" name="name" /> <br />
            Address: <br /><input type="text" name="address" /> <br />
            City: <br /><input type="text" name="city" /> <br />
            State: <br /><input type="text" name="state" /> <br />
            Zip: <br /><input type="text" name="zip" /> <br />   
            <input type="submit" value="Submit" /> 
        </form>
        
    </body>
</html>
