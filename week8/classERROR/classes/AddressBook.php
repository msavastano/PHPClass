<?php


class AddressBook extends DB{
    //process, display addressbook
    
    public function checkDeletes(){
        $deleteID = filter_input(INPUT_GET, "delete");
        
        if( NULL != $deleteID && Address::deleteEntry($deleteID)){
            echo '<p>Entry Deleted</p>';
        }
    }
    
    public function displayEditForm() {
        
    }
    
    public function isEdit() {
        return ( null != $this->getEditID() ); 
    }
    
     public function getEditID() {
        return filter_input(INPUT_GET, "edit");
            
        }        
    
    
    public function display() {
        getAddresses();
        
         if ( is_array($result) && count($result) ) { 
             
         
            echo '<table border="1"><caption>Address Book</caption><thead><tr>';
            echo '<th>Address</th><th>City</th><th>state</th><th>ZIP</th><th>Name</th>';
            echo '<th></th><th></th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($result as $row) {
                echo '<tr>';               
                echo '<td>',$row["address"],'</td>';
                echo '<td>',$row["city"],'</td>';
                echo '<td>',$row["state"],'</td>';
                echo '<td>',$row["zip"],'</td>';
                echo '<td>',$row["name"],'</td>';            
                echo '<td><a href=?edit=',$row["id"],'>Edit</a></td>';
                echo '<td><a href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody</table>';
       } else {
           echo '<p> No Records Found </p>';
       }  
    }
}
