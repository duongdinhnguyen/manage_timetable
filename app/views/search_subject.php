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
            <form action="" class="form" method="post">
                <div class="main">
                    
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
                        <button type="submit" class="btn-search" name="search-subject">Tìm kiếm</button>
                    </div>
                    <div>
                        <?php 
                            if(!intval($_SESSION['search-notification'])): ?>   
                                <p ><?php echo $_SESSION['search-notification']; ?></p>

                        <?php
                            else:
                        ?>
                                <p ><?php echo "Số môn học tìm thấy :  " .$_SESSION['search-notification']; ?></p>

                        <?php
                            endif;
                        ?>
                        
                    </div>
                    <?php 
                        if($_SESSION['dataSearch']): // kiểm tra $_SESSION['dataSearch'] có value hay không? khác với kiểm tra isset
                    ?>       
                                                        
                            <table>
                                <tr>
                                    <th>No</th>
                                    <th>Tên môn học</th>
                                    <th>Khóa</th>
                                    <th>Mô tả chi tiết</th>
                                    <th>Action</th>
                                </tr>
                            
                           
                            
                        <?php
                            foreach($_SESSION['dataSearch'] as $row): 
                        ?>
                                <tr>
                                    <td ><?php echo $row['id']; ?></td>
                                    <td ><?php echo $row['name']; ?></td>
                                    <td><?php echo "Năm ". (2022- $row['school_year']); ?></td>
                                    <td ><?php echo $row['description']; ?></td>

                                    <td>
                                    <button type="submit" name="remove-subject" class="btn-update-remove" onclick="return confirm('Bạn chắc chắn muốn xóa phòng học  <?php echo $row['name'] ?>' );" value = "<?php echo $row['id'];?>">Xóa</button>
                                    <button type="submit" name="change-subject" class="btn-update-remove" value = "<?php echo $row['id'];?>">Sửa</button>
                                    </td>
                                </tr>
                              
                        <?php endforeach; ?>
                            </table> 
                        <?php
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