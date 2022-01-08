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
    // update new password 2
    public function updatePassword2($id, $newPassword){
        
        $newPassword = md5($newPassword);
        $sql="UPDATE `admins` SET `password`='$newPassword', `reset_password_token` ='' WHERE login_id='$id'";
        return $this->__conn->query($sql);
        
    }
    
    //Xử lý yêu cầu thay đổi mật khẩu
    public function updateToken($id, $micro){
        $sql = "UPDATE `admins` SET `reset_password_token`='$micro' WHERE login_id = '$id'";
        return $this->__conn->query($sql);

    }

    //Lấy ra các giá trị đang yêu cầu đổi mật khẩu
    public function alladmins(){
        
        $sql = "SELECT * FROM `admins` WHERE reset_password_token <> ''";
        
        $result = $this->__conn->query($sql);

        return $result;
    }
}

$Admin = new Admin();
