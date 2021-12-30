<?php 
require_once './app/common/db.php';

class Admin extends DB{
    public function select_LoginId_and_Password(){
        $sql = "SELECT login_id, password FROM admins";
        return $this->__conn->query($sql);        
    }
}

$Admin = new Admin();
