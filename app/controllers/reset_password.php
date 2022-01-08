<?php
class ResetPassword{
    public function __construct(){
        $_SESSION['reset'] = "";

        if(isset($_REQUEST['reset-password'])){
            if(empty($_REQUEST['reset-input']) || trim($_REQUEST['reset-input']) == ''){
                $_SESSION['reset'] = "Chưa nhập login_id";
                
            }
            else if(strlen(trim($_REQUEST['reset-input']))<4){
                $_SESSION['reset'] = "Nhập login_id tối thiểu 4 kí tự";
            }
            else{
                require_once './app/models/admin.php';
                $data = $Admin->select_All_Admin();
                if(!$this->checkLoginID($data, $_REQUEST['reset-input'])){
                    $_SESSION['reset'] = 'Login id không tồn tại trong hệ thống';
                }
                else{
                    $_SESSION['reset'] = $_REQUEST['reset-input'];
                    $micro = microtime(true);
                    $Admin->updateToken($_REQUEST['reset-input'], $micro);
                    header('location:?');
                    // header('location:'.URLROOT.'/?router=reset-password-form');
                    // header("location:http://localhost/manage_timetable/?router=reset-password-form");
                }
            }
        }
    }

    // kiểm tra xem đã nhập đúng login_id tồn tại trong database chưa
    public function checkLoginID($data, $dataInput){
        foreach($data as $row){
            if($row['login_id'] ==$dataInput ){
                return true;
            }
        }
        return false;
    }
}
$ResetPassword = new ResetPassword;
require_once './app/views/reset_password.php';