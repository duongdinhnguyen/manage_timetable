<?php
class Login{
    public function __construct(){
        $_SESSION['login']= '';

        if(isset($_REQUEST['login-submit'])){
            // Nếu chưa nhập user
            if(empty($_REQUEST['value-user']) || trim($_REQUEST['value-user'])==''){
                $_SESSION['login']= 'Chưa nhập tài khoản';
            }
            // Nếu nhập user <4 ký tự
            else if(strlen(trim($_REQUEST['value-user']))<4){
                $_SESSION['login']= 'Hãy nhập tài khoản tối thiểu 4 ký tự';
            }
            // Nếu chưa nhập password
            else if(empty($_REQUEST['value-password']) || trim($_REQUEST['value-password'])==''){
                $_SESSION['login']= 'Chưa nhập mật khẩu';
            }
            else{
                require_once './app/models/admin.php';
                $user = trim($_REQUEST['value-user']);
                $password = md5(trim($_REQUEST['value-password']));
                $data = $Admin->select_All_Admin();
                $result = $this->check($data, $user, $password);
                if($result == null){
                    $_SESSION['login']= "Sai tài khoản hoặc mật khẩu, vui lòng nhập lại !!!";
                }
                   
                else  {
                    $_SESSION['login']= $result;
                    // header("location:http://localhost/manage_timetable/?router=home");
                    header('location:'.URLROOT.'/?router=home');
                }
            }
        }
    }

    public function check($data, $user, $password){
        foreach($data as $row){
            if($row['login_id']==$user && $row['password']== $password){
                return $user;
            }
        }
        return null;
    }
}

$Login = new Login;

require_once './app/views/login.php';// Đặt view vào sau để SESSION được cập nhật
