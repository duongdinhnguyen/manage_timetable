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
    <link rel="stylesheet" href="./web/css/confirm.css">
    <title>Document</title>
</head>
<body>
    <div class="timetable">
        <form action="" class="form" method="POST" >
            <div class="main">
            <div class="element">
                    <label for="select-phankhoa">Khoa</label>
                    <input type="text" class="input-element" name="confirm-khoa" value="<?php echo "Năm ". $data[0];?>" readonly>
                </div>
                <div class="element">
                    <label for="select-subject">Môn học</label>
                    <input type="text" class="input-element" name="confirm-subject" value="<?php echo $subjectName;?>" readonly>
                </div>
                <div class="element">
                    <label for="select-teacher">Giáo viên</label>
                    <input type="text" class="input-element" name="confirm-teacher" value="<?php echo $teacherName;?>" readonly>
                </div>
                <div class="element">
                    <label for="select-days">Thứ</label>
                    <input type="text" class="input-element" name="confirm-day" value="<?php echo $data[3];?>" readonly>
                </div>
                <div class="element">
                    <label for="list_lesson">Tiết học</label>
                    <ul id="list_lesson">
                        <?php 
                            foreach($data[4] as $row):?>
                                <li class="item_lesson">
                                    <p><?php echo "Tiết ".$row; ?></p>
                                </li>
                        <?php   
                            endforeach;
                        ?>
                    </ul>
                </div>
                <div class="element">
                    <label for="description">Chú ý</label>
                    <textarea name="" id="description" cols="20" rows="3" readonly><?php echo $data[5]; ?></textarea>
                </div>
                <div class="element">
                    <a class="btn-submit btn-change" name= "change" href="?router=add-schedule">Sửa lại</a>
                    <button type="submit" class="btn-submit" name="add-new-schedule">Tiếp tục</button>
                </div>
                <div class="element">
                    <a href="?router=home">Trở về trang chủ</a>
                </div>
            </div>
        </form>
    </div>

</body>
</html>