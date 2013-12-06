<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Website
 *
 * @author michael
 */
class Website extends DB{
    
    public function initWebpage($lastID){
        $dbc = new DB();
        $db = $dbc->getDB();
        
        $statement = $db->prepare('insert into page set user_id = :user_id' );                
                $statement->bindParam(':user_id', $lastID, PDO::PARAM_INT);
                if ($statement->execute() ){                
                    return true;
                }        
    }
    
    public function getlastid(){
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1');
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getWebsiteData($id) {
        $dbc = new DB();
        $db = $dbc->getDB();
        
        $statement = $db->prepare('select page.user_id, users.user_id, users.website, ' 
                . 'theme, title, address, phone, page.email, about, page.page_id '
                . 'from page, users '
                . 'where users.user_id = :id AND page.user_id = users.user_id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getUserID($email) {
        $dbc = new DB();
        $db = $dbc->getDB();
        
        $statement = $db->prepare('select user_id from users '
                . 'where email = :email');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function updatePageData($data){
        
                    
            $dbc = new DB();
            $db = $dbc->getDB();
            if (count($data) ) {
                $id = $data['nameid'];
                $address = $data['address'];
                $theme = $data['theme'];
                $title = $data['pageTitle'];
                $email = $data['email'];
                $phone = $data['phone'];
                $about = $data['about'];
                
            $statement = $db->prepare('update page set'
                    .' address = :address, title = :title,'
                    .' about = :about, theme = :theme,'
                    .' phone = :phone, email = :email'
                    . ' where page_id = :id');
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->bindParam(':about', $about, PDO::PARAM_STR);
            $statement->bindParam(':theme', $theme, PDO::PARAM_STR);
            $statement->bindParam(':title', $title, PDO::PARAM_STR);
            $statement->bindParam(':address', $address, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
            
            if ( $statement->execute() ) {
                return true;
            }
            }
        return false;
        }
        
    }
    

