<?php


class Website extends DB{
    
    //iniates web page on user creation
    public function initWebpage($lastID){
        $dbc = new DB();
        $db = $dbc->getDB();        
        $statement = $db->prepare('insert into page set user_id = :user_id, '
                . 'title = :titleDummy, '
                . 'theme = :themeDummy, '
                . 'address = :addressDummy, '
                . 'phone = :phoneDummy, '
                . 'email = :emailDummy, '
                . 'about = :aboutDummy');   
                $dumTitle = 'title goes here';
                $dumTheme = '1';
                $dumAddress = 'address';
                $dumPhone = '';
                $dumEmail = 'sample-email@sample.com';
                $dumAbout = 'this site is about';
        $statement->bindParam(':user_id', $lastID, PDO::PARAM_INT);
        $statement->bindParam(':titleDummy', $dumTitle , PDO::PARAM_STR);
        $statement->bindParam(':themeDummy', $dumTheme, PDO::PARAM_STR);
        $statement->bindParam(':addressDummy', $dumAddress, PDO::PARAM_STR);
        $statement->bindParam(':phoneDummy', $dumPhone, PDO::PARAM_STR);
        $statement->bindParam(':emailDummy', $dumEmail, PDO::PARAM_STR);
        $statement->bindParam(':aboutDummy', $dumAbout, PDO::PARAM_STR);
            if ($statement->execute() ){                
                return true;
            }        
    }
    
    //retrieves the last id from users table
    public function getlastid(){
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1');
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    //gets all data from website table
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
    
    //updates the page data from edit form
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
                $about = strip_tags($data['about']);
                
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
                echo '<div id="userUp"><span>User Updated</span></div>';
                return true;
            }
            }
        return false;
        }
        
    }
    

