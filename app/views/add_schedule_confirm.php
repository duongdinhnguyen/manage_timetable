<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./web/css/base.css">
    <link rel="stylesheet" href="./web/css/confirm.css">
    <title>Document</title>
</head>
<body>
    <?php 
        // Sử lí thông tin nhận từ create_timetable.php và hiển thị dữ liệu
        
        if(isset($_POST['confirm'])){
            echo "Hello";
        }
    
    ?>
    <?php 
        // Sử lí khi nhấn sửa hoặc đăng kí
        if(isset($_REQUEST["confirm"])){

        }
    ?>
    <div class="timetable">
        <form action="<?php $_PHP_SELF ?>" class="form" name="confirm">
            <div class="main">
            <div class="element">
                    <label for="select-phankhoa">Khoa</label>
                    <input type="text" class="input-element" name="confirm-khoa" readonly>
                </div>
                <div class="element">
                    <label for="select-subject">Môn học</label>
                    <input type="text" class="input-element" name="confirm-subject" readonly>
                </div>
                <div class="element">
                    <label for="select-teacher">Giáo viên</label>
                    <input type="text" class="input-element" name="confirm-teacher" readonly>
                </div>
                <div class="element">
                    <label for="select-days">Thứ</label>
                    <input type="text" class="input-element" name="confirm-day" readonly>
                </div>
                <div class="element">
                    <label for="list_lesson">Tiết học</label>
                    <ul id="list_lesson">
                        <li class="item_lesson">
                            <p>Tiết 1</p>
                        </li>
                        <li class="item_lesson">
                            
                            <p>Tiết 1</p>
                        </li>
                        <li class="item_lesson">
                            <p>Tiết 1</p>
                        </li>
                        <li class="item_lesson">
                            <p>Tiết 1</p>
                        </li>
                        <li class="item_lesson">
                            <p>Tiết 1</p>
                        </li>
                        
                    </ul>
                </div>
                <div class="element">
                    <label for="description">Chú ý</label>
                    <textarea name="" id="description" cols="20" rows="3"></textarea>
                </div>
                <div class="element">
                    <a class="btn-submit" name= "change" href="?router=add-schedule">Sửa lại</a>
                    <a class="btn-submit" name= "register" href="?router=add-schedule-complete">Đăng kí</a>
                </div>
            </div>
        </form>
    </div>

</body>
</html>