<!DOCTYPE html>
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
                    <p><?php
                        $result = isset($_SESSION['add-schedule']) ? $_SESSION['add-schedule'] : '';
                        echo $result;
                        
                    ?></p>
                </div>
                <div class="element">
                    <label for="khoa-hoc">Khóa</label>
                    <select id="khoa-hoc" class="select-element" name="khoa-hoc">
                            <option value="" name="khoa-hoc">Chọn khóa học</option>
                            <option value="2021" name="khoa-hoc">Năm 1</option>
                            <option value="2020" name="khoa-hoc">Năm 2</option>
                            <option value="2019" name="khoa-hoc">Năm 3</option>
                            <option value="2018" name="khoa-hoc">Năm 4</option>
                        </select>
                </div>
                <div class="element">
                    <label for="select-subject">Môn học</label>
                    <select name="subject" class="select-element" id="select-subject">
                        <option value="" >Chọn môn học</option>
                        <?php 
                            foreach($allSubject as $row): ?>
                                <option value="<?php  echo $row['id']; ?>" name="subject"><?php echo $row['name']; ?></option>
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
                                    <option value="<?php  echo $row['id']; ?>" name="teacher"><?php echo $row['name']; ?></option>
                                <?php endforeach;
                            ?>
                    </select>
                </div>
                <div class="element">
                    <label for="select-days">Thứ</label>
                    <select name="day" class="select-element" id="select-days">
                        <option value="" name="day">Chọn ngày</option>
                        <option value="Thứ 2" name="day">Thứ 2</option>
                        <option value="Thứ 3" name="day">Thứ 3</option>
                        <option value="Thứ 4" name="day">Thứ 4</option>
                        <option value="Thứ 5" name="day">Thứ 5</option>
                        <option value="Thứ 6" name="day">Thứ 6</option>
                        <option value="Thứ 7" name="day">Thứ 7</option>
                        <option value="Chủ nhật" name="day">Chủ nhật</option>
                    </select>
                </div>
                <div class="element">
                    <label for="list_lesson">Tiết học</label>
                    <ul id="list_lesson">
                        <li class="item_lesson">
                            <input id="tiet-hoc-1" type="checkbox" name="tiethoc[]" value="1">
                            <label for="tiet-hoc-1">Tiết 1</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-2" type="checkbox" name="tiethoc[]" value="2">
                            <label for="tiet-hoc-2">Tiết 2</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-3" type="checkbox" name="tiethoc[]" value="3">
                            <label for="tiet-hoc-3">Tiết 3</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-4" type="checkbox" name="tiethoc[]" value="4">
                            <label for="tiet-hoc-4">Tiết 4</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-5" type="checkbox" name="tiethoc[]" value="5">
                            <label for="tiet-hoc-5">Tiết 5</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-6" type="checkbox" name="tiethoc[]" value="6">
                            <label for="tiet-hoc-6">Tiết 6</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-7" type="checkbox" name="tiethoc[]" value="7">
                            <label for="tiet-hoc-7">Tiết 7</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-8" type="checkbox" name="tiethoc[]" value="8">
                            <label for="tiet-hoc-8">Tiết 8</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-9" type="checkbox" name="tiethoc[]" value="9">
                            <label for="tiet-hoc-9">Tiết 9</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-10" type="checkbox" name="tiethoc[]" value="10">
                            <label for="tiet-hoc-10">Tiết 10</label>
                        </li>
                    </ul>
                </div>
                <div class="element">
                    <label for="description">Chú ý</label>
                    <textarea name="description" id="description" cols="30" rows="3"></textarea>
                </div>
                <div class="element">
                    <button type="submit" class="btn-submit" name= "confirm" >Xác nhận</button>
                    <!-- <a href="?router=add-schedule-confirm">Xác nhận</a> -->
                </div>
            </div>
        </form>
    </div>
</body>
</html>