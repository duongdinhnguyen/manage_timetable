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
        <form class="form" method="POST" action="">
            <div class="main">
                <div class="element">
                    <p class="message-error">
                        <?php $result = isset($_SESSION['reset']) ? $_SESSION['reset'] : ''; 
                            echo $result;
                        ?>
                    </p>
                </div>
                <div class="element">
                    <label for="reset-password">Người dùng</label>
                    <input id="reset-password" type="text" class="input-element" name="reset-input">
                </div>
                <div class="element">
                    <button type="submit" class="btn-submit" name="reset-password">Đặt lại mật khẩu</button>
                </div>
                <div class="element">
                    <a href="?">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>