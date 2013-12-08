<?php


class Name extends DB {
    
    //Add, Delete, Get, and Update names
    //getName(id), getAllNames(), updateNames(id), deleteName(id), addName(id)
    
    public function createName(){
    $db->lastInsertId();
    
    }
}
