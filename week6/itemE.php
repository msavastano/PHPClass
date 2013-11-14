<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ItemE</title>
    </head>
    <body>
        <?php
         /*
        * Please follow the instructions below.
        * 
          * It is very important to know how to connect to a database and
          * how to retrive data.  PDO in PHP makes it easier to connect
          * and access data.
          * 
          * below is code that will access an address book.  With the results
          * echo out the data in a table, list, etc.  the results are returned in
          * a multidimentional array, so the first set is a regular array and the 
          * inner array is a key=>value pair.
          * 
          * the for each loop is ideal.
          * 
        * 
        */

        
        $db = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");

        $statement = $db->prepare('select * from addressbook');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        
        // put your code here
        
        if (count($result) ){
            echo '<table border="1">';
            echo '<tr> <td> Name </td> <td> Address </td> <td> City </td> <td> State </td> <td> Zip </td></tr>';
            foreach ($result as $value){
                echo '<tr>';
                echo '<td>',$value['name'],'</td>';
                echo '<td>',$value['address'],'</td>';
                echo '<td>',$value['city'],'</td>';
                echo '<td>',$value['state'],'</td>';
                echo '<td>',$value['zip'],'</td>';
                echo '</tr>';                
            }
            echo '</table>';
            
        }else{
            echo "NO Data";
        }
        ?>
    </body>
</html>
