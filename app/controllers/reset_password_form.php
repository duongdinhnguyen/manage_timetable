<?php
require_once './app/controllers/checkReset.php';
require_once './app/models/admin.php';
class ResetPasswordForm{
    public function __construct(){
        if(isset($_SESSION['count'])){
            for($i=1;$i<=$_SESSION['count'];$i++){
                if(isset($_REQUEST['action-reset'.$i])){
                   
                    if(empty($_REQUEST['newpassword'.$i])){
                        $_SESSION['new-password'.$i] = "Hãy nhập mật khẩu mới";
                    }
                    else if(strlen($_REQUEST['newpassword'.$i]) <6){
                        $_SESSION['new-password'.$i] = "Tối thiểu 6 ký tự";
                    }
                    else {
                        $Admin = new Admin(); 
                        $newpass = $_REQUEST['newpassword'.$i];
                        $loginid = $_REQUEST['action-reset'.$i];     
                        $Admin->updatePassword2($loginid, $newpass);
                        
                    }
                    
                }
            }
        }
        
        
       
    }

    // Kiểm tra token đã nhập có tồn tại trong
    public function checkToken($data, $token){
        foreach($data as $row){
           if($row['reset_password_token'] == $token){
               return $row['id'];
           }
        }
        return 0;
    }
}
$ResetPasswordForm = new ResetPasswordForm();
require_once './app/views/reset_password_form.php';
