<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./web/css/base.css">
    <title>Document</title>
</head>
<body>
    <div class="timetable">
        <form action="" class="form" method="POST">
            <div class="main">
                <div class="element">
                    <label>Tên người dùng</label>
                    <label>Mật khẩu mới</label>
                    <label>Reset Password Token</label>
                    <label>Action</label>
                </div>
                <div class="element">
                    <p><?php echo $_SESSION['reset'];?></p>
                    <input type="text" name="new-password" class="input-element" style="width:100px;">
                    <input type="text" name="token-password" class="input-element" style="width:100px;">
                    <button type="submit" class="btn-submit" name="action-reset">Reset</button>
                </div>
                <div class="element">
                    <p class="message-notification"><?php 
                    $result = isset($_SESSION['new-password']) ? $_SESSION['new-password']: '';
                    echo $result; 
                    
                    ?></p>
                </div>
                <div class="element">
                    <!-- <a href="http://localhost/manage_timetable/">Quay lại trang login</a> -->
                    <a href="<?= URLROOT ?>/">Quay lại trang login</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>