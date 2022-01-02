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
                    <p><?php echo $_SESSION['search-schedule']; ?></p>
                </div>
                <div class="element">
                    <label for="">Khóa</label>
                    <select name="khoa" id="" class="select-element">
                        <option value="">Chọn khóa học</option>
                        <option value="2021" name="khoa">Năm 1</option>
                        <option value="2020" name="khoa">Năm 2</option>
                        <option value="2019" name="khoa">Năm 3</option>
                        <option value="2018" name="khoa">Năm 4</option>
                    </select>
                </div>
                <div class="element">
                    <label for="">Môn học</label>
                    <select name="subject" id="" class="select-element">
                        <option value="">Chọn môn học</option>
                        <?php 
                            foreach($allSubject as $row): 
                        ?>

                            <option value="<?php echo $row['id']; ?>" name="subject"><?php echo $row['name']; ?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="element">
                    <label for="">Giáo viên</label>
                    <select name="teacher" id="" class="select-element">
                        <option value="" name="teacher">Chọn giáo viên</option>
                        <?php 
                            foreach($allTeacher as $row): 
                        ?>

                            <option value="<?php echo $row['id']; ?>" name="teacher"><?php echo $row['name']; ?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="element">
                    <button type="submit" class="btn-submit" name="search-schedule">Tìm kiếm</button>
                </div>

                <!-- Kiểm tra $_SESSION['data-search-schedule] có value thì hiển thị các schedule -->
                <?php 
                    if($_SESSION['data-search-schedule']): 
                ?>
                    <div class="element">
                        <label for=""><b>ID</b></label>
                        <label for=""><b>Khóa</b></label>
                        <label for=""><b>Môn học</b></label>
                        <label for=""><b>Giáo viên</b></label>
                        <label for=""><b>Thứ</b></label>
                        <label for=""><b>Tiết học</b></label>
                        <label for=""><b>Action</b></label>
                    </div>
                <?php
                        foreach($_SESSION['data-search-schedule'] as $row):
                ?>
                            <div class="element">
                                <label for=""><?php echo $row['id'] ;?></label>
                                <label for=""><?php echo "Năm ". 2022- $row['school_year'] ;?></label>
                                <label for=""><?php echo $row['nameSubject'] ;?></label>
                                <label for=""><?php echo $row['nameTeacher'] ;?></label>
                                <label for=""><?php echo $row['week_day'] ;?></label>
                                <label for="">
                                    <?php 
                                        $path = "./web/file/lesson/" .$row['lesson'];
                                        $fp = @fopen($path, "r");
                                        if(!$fp){
                                            echo "Không mở được file chứa tiết học";
                                        }
                                        else{
                                            while(!feof($fp)){
                                                echo fgets($fp);
                                            }

                                            fclose($fp);
                                            
                                        }
                                    ?>
                                </label>
                                <label for="">
                                <button type="submit" name="remove-schedule" class="btn-submit" onclick="return confirm('Bạn chắc chắn muốn xóa?');" value = "<?php echo $row['id'];?>">Xóa</button>
                                <button type="submit" name="change-schedule" class="btn-submit" value = "<?php echo $row['id'];?>">Sửa</button>
                                </label>
                            </div>
                <?php            
                        endforeach;
                    endif;
                ?>
                <div class="element">
                    <a href="?router=home">Trở về trang chủ</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>