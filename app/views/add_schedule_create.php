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
    <link rel="stylesheet" href="./web/css/create.css">
    <title>Document</title>
</head>
<body>
    
    <div class="timetable">
        <form action="" class="form" method = "POST">
            <div class="main">
                <div class="element">
                    <p class="message-error"><?php
                        $result = isset($_SESSION['add-schedule-notifi']) ? $_SESSION['add-schedule-notifi'] : '';
                        echo $result;
                                              
                    ?></p>
                </div>
                <div class="element">
                    <label for="khoa-hoc">Khóa</label>
                    <select id="khoa-hoc" class="select-element" name="khoa-hoc">
                        
                            <option value="" name="khoa-hoc">Chọn khóa học</option>
                            <option value="1" name="khoa-hoc" <?php if($dataCreateSchedule[0]==1){echo "selected";}?> >Năm 1</option>
                            <option value="2" name="khoa-hoc" <?php if($dataCreateSchedule[0]==2){echo "selected";}?> >Năm 2</option>
                            <option value="3" name="khoa-hoc" <?php if($dataCreateSchedule[0]==3){echo "selected";}?> >Năm 3</option>
                            <option value="4" name="khoa-hoc" <?php if($dataCreateSchedule[0]==4){echo "selected";}?> >Năm 4</option>
                        </select>
                </div>
                <div class="element">
                    <label for="select-subject">Môn học</label>
                    <select name="subject" class="select-element" id="select-subject">
                        <option value="" >Chọn môn học</option>
                        <?php 
                            foreach($allSubject as $row): ?>
                                <option value="<?php  echo $row['id']; ?>" name="subject" <?php if($dataCreateSchedule[1]==$row['id']){echo "selected";}?> ><?php echo $row['name']; ?></option>
                            <?php endforeach;
                        ?>
                    </select>
                </div>
                <div class="element">
                    <label for="select-teacher">Giáo viên</label>
                    <select name="teacher" class="select-element" id="select-teacher">
                        <option value="" >Chọn giáo viên</option>
                            <?php 
                                foreach($allTeacher as $row): ?>
                                    <option value="<?php  echo $row['id']; ?>" name="teacher" <?php if($dataCreateSchedule[2]==$row['id']){echo "selected";}?> ><?php echo $row['name']; ?></option>
                                <?php endforeach;
                            ?>
                    </select>
                </div>
                <div class="element">
                    <label for="select-days">Thứ</label>
                    <select name="day" class="select-element" id="select-days">
                        <option value="" name="day">Chọn ngày</option>
                        <option value="Thứ 2" name="day" <?php if($dataCreateSchedule[3]=="Thứ 2"){echo "selected";}?> >Thứ 2</option>
                        <option value="Thứ 3" name="day" <?php if($dataCreateSchedule[3]=="Thứ 3"){echo "selected";}?> >Thứ 3</option>
                        <option value="Thứ 4" name="day" <?php if($dataCreateSchedule[3]=="Thứ 4"){echo "selected";}?> >Thứ 4</option>
                        <option value="Thứ 5" name="day" <?php if($dataCreateSchedule[3]=="Thứ 5"){echo "selected";}?> >Thứ 5</option>
                        <option value="Thứ 6" name="day" <?php if($dataCreateSchedule[3]=="Thứ 6"){echo "selected";}?> >Thứ 6</option>
                        <option value="Thứ 7" name="day" <?php if($dataCreateSchedule[3]=="Thứ 7"){echo "selected";}?> >Thứ 7</option>
                        <option value="Chủ nhật" name="day" <?php if($dataCreateSchedule[3]=="Chủ nhật"){echo "selected";}?> >Chủ nhật</option>
                    </select>
                </div>
                <div class="element">
                    <label for="list_lesson">Tiết học</label>
                    <ul id="list_lesson">
                        <li class="item_lesson">
                            <input id="tiet-hoc-1" type="checkbox" name="tiethoc[]" value="1" <?php if(in_array("1",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-1">Tiết 1</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-2" type="checkbox" name="tiethoc[]" value="2" <?php if(in_array("2",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-2">Tiết 2</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-3" type="checkbox" name="tiethoc[]" value="3" <?php if(in_array("3",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-3">Tiết 3</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-4" type="checkbox" name="tiethoc[]" value="4" <?php if(in_array("4",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-4">Tiết 4</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-5" type="checkbox" name="tiethoc[]" value="5" <?php if(in_array("5",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-5">Tiết 5</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-6" type="checkbox" name="tiethoc[]" value="6" <?php if(in_array("6",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-6">Tiết 6</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-7" type="checkbox" name="tiethoc[]" value="7" <?php if(in_array("7",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-7">Tiết 7</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-8" type="checkbox" name="tiethoc[]" value="8" <?php if(in_array("8",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-8">Tiết 8</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-9" type="checkbox" name="tiethoc[]" value="9" <?php if(in_array("9",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-9">Tiết 9</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-10" type="checkbox" name="tiethoc[]" value="10" <?php if(in_array("10",$dataCreateSchedule[4])){ echo "checked";} ?> >
                            <label for="tiet-hoc-10">Tiết 10</label>
                        </li>
                    </ul>
                </div>
                <div class="element">
                    <label for="description">Chú ý</label>
                    <textarea name="description" id="description" cols="30" rows="3" ><?php echo $dataCreateSchedule[5]; ?></textarea>
                </div>
                <div class="element">
                    <button type="submit" class="btn-submit" name= "confirm" >Xác nhận</button>
                    <!-- <a href="?router=add-schedule-notifi-confirm">Xác nhận</a> -->
                </div>
                <div class="element">
                    <a href="?router=home">Trở về trang chủ</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>