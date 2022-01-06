<!DOCTYPE html>
<?php
// require_once './app/controllers/checkLogin.php';
if(!isset($_SESSION['login']) || $_SESSION['login']==''){
    header("location:http://localhost/manage_timetable/");
    // header('location:'.URLROOT.'/');
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./web/css/base.css">
    <link rel="stylesheet" href="./web/css/complete.css">
    <title>Document</title>
</head>
<body>
    <form action="" class="form">
        <div class="content">
        <?php   
            $result= isset($_SESSION['Msg-add-subject']) ? $_SESSION['Msg-add-subject'] :' '  ;
            echo $result;
        ?>
        <a href="?router=home" class="notification">Trở lại trang chủ</a>
        </div>
    </form>
    
</body>
</html>