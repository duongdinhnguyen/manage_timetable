<?php 
require_once './app/common/db.php';

class Admin extends DB{
    // Lấy ra user và password để xử lý đăng nhập
    public function select_All_Admin(){
        $sql = "SELECT * FROM admins";
        return $this->__conn->query($sql);        
    }

    // Lấy ra tất cả các bản ghi có login_id đc truyền vào
    public function select_All_LoginId($login_id){
        $sql = "SELECT * FROM admins where login_id='$login_id'";
        return $this->__conn->query($sql);   
    }

    // update new password
    public function updatePassword($id, $newPassword){
        $_SESSION['new-password'] = "Reset password thành công, mật khẩu mới là: ".$newPassword;
        $newPassword = md5($newPassword);
        $sql="UPDATE admins SET password='$newPassword' WHERE id='$id'";
        $this->__conn->exec($sql);
        
    }
    
}

$Admin = new Admin();
