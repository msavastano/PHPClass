<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreviewPage
 *
 * @author michael
 */
class PreviewPage extends DB{
    
    public static function getPreviewData($website){
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('SELECT users.website, page.user_id, users.user_id, '
                . 'website, page.email, page_id, about, title, theme, address, phone '
                . 'FROM users, page '
                . 'where website = :website AND page.user_id = users.user_id');
        $statement->bindParam(':website', $website, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    
    
}
