<?php


class Guestbook extends DB {
    //gets data for display
    public function getGuestBookData() {
        $db = $this->getDB();        
        if (NULL != $db ){
            $stmt = $db->prepare('select name, email, comments from guestbook');
            $stmt->execute();
            //gets all data, fetch only gets one row - return multi dem array 
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);                 
        }
        return $result;
    }
        
    public function displayGuestbook(){
        $results = $this->getGuestBookData();      
        //if results are there, dislay in table form
        if (count($results) ){
            echo '<table border="1">';
            echo '<tr> <td> Email </td> <td> Name </td> <td> Comments </td> </tr>';
            foreach ($results as $value){
                echo '<tr>';
                echo '<td>',$value['email'],'</td>';
                echo '<td>',$value['name'],'</td>';
                echo '<td>',$value['comments'],'</td>';
                echo '</tr>';                
            }
            echo '</table>';
            
        }else{
            echo "NO comments posted";
        }
    }
    
    //calls validator static methods to check data, fires off process function if valid
    public function entryIsValid(){
        if(isset($_POST['name'])){
            if (Validator::nameIsValid($_POST['name']) && Validator::emailIsValid($_POST['email']) && 
                    Validator::commentsIsValid($_POST['comments'])) {
                       $this->processGuestbook();   
                    }  
            }
    }

    public function processGuestbook(){
    //check post data
    //put into db    
    $db = $this->getDB();
    
    if (null != $db) {
            $stmt = $db->prepare('insert into guestbook set name = :nameValue, '
                    . 'email = :emailValue, comments = :commentsValue');
            $stmt->bindParam(':nameValue', $_POST['name'], PDO::PARAM_STR);
            $stmt->bindParam(':commentsValue', $_POST['comments'], PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $_POST['email'], PDO::PARAM_STR);
            if ($stmt->execute() ){
                header("location: guestbook.php");
                return true;
            }
        }
        return false;  
    }
 }
    

    

