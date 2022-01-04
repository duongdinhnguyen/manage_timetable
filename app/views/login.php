<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./web/css/base.css">
    <link rel="stylesheet" href="./web/css/login.css">
    <title>Document</title>
    
</head>
<body>
       <div class="timetable">
        <form class="form" action="" method="POST">
            <div class="main">
                <div class="element">
                    <p class="message-error"><?php echo $_SESSION["login"]; ?></p>
                </div>
                <div class="element">
                    <label for="login-user">Tên đăng nhập</label>
                    <input id="login-user" type="text" class="input-element" name="value-user">
                </div>
                <div class="element">
                    <label for="login-password">Mật khẩu</label>
                    <input id="login-password" type="password" class="input-element" name="value-password">
                </div>
                <div class="element">
                    <a href="?router=reset-password">Reset password</a>
                </div>
                <div class="element">
                    <button type="submit" class="btn-submit" name= "login-submit" >Đăng nhập</button>
                </div>
            </div>
        </form> 
       </div>
</body>

</html>
