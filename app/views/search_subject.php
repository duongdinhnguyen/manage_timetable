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
                        <?php 
                            echo $_SESSION['search-subject'];
                        ?>
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
                        if($dataSearch && $_SESSION['search-subject'] > 0):
                    ?>              
                            <div class="element">
                                <label for="">ID</label>
                                <label for="">Tên môn học</label>
                                <label for="">Khóa</label>
                                <label for="">Mô tả</label>
                                <label for="">Action</label>
                            </div>
                            
                        <?php
                            foreach($dataSearch as $row): 
                        ?>
                              <div class="element">
                                  <label for=""><?php echo $row['id']; ?></label>
                                  <label for=""><?php echo $row['name']; ?></label>
                                  <label><?php echo "Năm ". (2022- $row['school_year']); ?></label>
                                  <label for=""><?php echo $row['description']; ?></label>
                                  <button type="submit" class="btn-submit" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</button>
                                  <button type="submit" class="btn-submit">Sửa</button>
                              </div>  
                        <?php endforeach;
                        
                        endif;
                        ?>
                    <div class="element">
                        <a href="http://localhost/manage_timetable/?router=home" >Trở lại trang chủ</a>
                    </div>
                </div>
            </form>
        </div>
</body>
</html>