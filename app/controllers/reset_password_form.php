<?php
require_once './app/controllers/checkReset.php';
require_once './app/models/admin.php';
class ResetPasswordForm{
    public function __construct(){
        $_SESSION['new-password'] = '';
        if(isset($_REQUEST['action-reset'])){
            if(empty($_REQUEST['new-password']) || trim($_REQUEST['new-password'])==''){
                $_SESSION['new-password'] = "Chưa nhập mật khẩu mới";
            }
            else if(strlen(trim($_REQUEST['new-password'])) <6){
                $_SESSION['new-password'] = "Mật khẩu mới tối thiểu 6 ký tự";

            }
            else if(empty($_REQUEST['token-password']) || trim($_REQUEST['token-password'])==''){
                $_SESSION['new-password'] = "Chưa nhập token password";

            }
            else{
                // Xử lý khi đã nhập đầy đủ thông tin
                require_once './app/models/admin.php';
                $Admin = new Admin();
                $data = $Admin->select_All_LoginId($_SESSION['reset']);
                $result = $this->checkToken($data, $_REQUEST['token-password']);
                if($result== 0){
                    $_SESSION['new-password'] = "Token Password không đúng";
                }
                else{
                    // Nếu token password đúng thì tiến hành reset password trong database
                    $_SESSION['new-password'] = "Token Password đúng";
                    $Admin->updatePassword($result, $_REQUEST['new-password']);
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