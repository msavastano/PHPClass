<?php


 
class Address extends DB {
    //Add, Delete, Get, and Update names
    //get(id), getAllAddress(), updateAddress(id), deleteAddress(id), addAddress(id)
    
    public function createAddress($name_id){
        
    }


    public static function deleteEntry($id) {
        $dbc = new db();
        $db = $dbc->getDB();
        $statement = $db->prepare('delete from address where id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        if($statement->execute()){
            return true;
        }
       return false;
    }
    
     public static function getAddress($id){
        $dbc = new db();
        $db = $dbc->getDB();
        $statement = $db->prepare('select * from address, name where id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
          return true;
         
         
     }
     
     public static function getAddresses(){
         $statement = $db->prepare('select * from address, name '
                . 'where name.id = address.name_id');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
         
     }
}
