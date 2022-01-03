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
                        <p class="message-notification">
                            <?php 
                                echo $_SESSION['search-notification'];
                            ?>
                        </p>
                    </div>
                    <div class="element">
                        <label for="khoa-hoc">Khóa học</label>
                        <select id="khoa-hoc" class="select-element" name="khoa-hoc">
                            <option value="" name="khoa-hoc">Chọn khóa học</option>
                            <option value="2021" name="khoa-hoc">Năm 1</option>
                            <option value="2020" name="khoa-hoc">Năm 2</option>
                            <option value="2019" name="khoa-hoc">Năm 3</option>
                            <option value="2018" name="khoa-hoc">Năm 4</option>
                        </select>
                    </div>
                    <div class="element">
                        <label for="tu-khoa">Từ khóa</label>
                        <input type="text" id="tu-khoa" class="input-element" name="keyword">
                    </div>
                    <div class="element">
                        <button type="submit" class="btn-submit" name="search-subject">Tìm kiếm</button>
                    </div>
                    
                    <?php 
                        if($_SESSION['dataSearch']): // kiểm tra $_SESSION['dataSearch'] có value hay không? khác với kiểm tra isset
                    ?>              
                            <div class="element">
                                <label for=""><b>ID</b></label>
                                <label for=""><b>Tên môn học</b></label>
                                <label for=""><b>Khóa</b></label>
                                <label for=""><b>Mô tả</b></label>
                                <label for=""><b>Action</b></label>
                            </div>
                            
                        <?php
                            foreach($_SESSION['dataSearch'] as $row): 
                        ?>
                              <div class="element">
                                  <label for=""><?php echo $row['id']; ?></label>
                                  <label for=""><?php echo $row['name']; ?></label>
                                  <label><?php echo "Năm ". (2022- $row['school_year']); ?></label>
                                  <label for=""><?php echo $row['description']; ?></label>

                                  <label for="">
                                  <button type="submit" name="remove-subject" class="btn-submit" onclick="return confirm('Bạn chắc chắn muốn xóa?');" value = "<?php echo $row['id'];?>">Xóa</button>
                                  <button type="submit" name="change-subject" class="btn-submit" value = "<?php echo $row['id'];?>">Sửa</button>
                                  </label>
                              </div>  
                        <?php endforeach;
                        
                        endif;
                        ?>
                    <div class="element">
                        <!-- <a href="http://localhost/manage_timetable/?router=home" >Trở lại trang chủ</a> -->
                        <a href="<?= URLROOT ?>/?router=home" >Trở lại trang chủ</a>
                    </div>
                </div>
            </form>
        </div>
</body>
</html>